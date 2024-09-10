<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Addmateri;
use App\Models\Jadwal;
use App\Models\Addvideo;
use App\Models\Jawab;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class AddmateriController extends Controller
{
    public function __construct()
  {
    $this->middleware('auth');
  }

  public function index($id) {

    //di buat array utuk deskrip kode nya
    // 0 => "11.2D.01"
    // 1 => "11-001"
    // 2 => "201704121"

    if(Auth::user()->status == 'G' or Auth::user()->status == 'A'){
      $user = User::where('id', Auth::user()->id)->first();

        $pecah=explode(',',Crypt::decryptString($id));
         //materi pemblajaran
        $addmateri = Addmateri::join('kelas', 'addmateris.id_kelas', '=', 'kelas.id')
        ->select('addmateris.*','kelas.nama as nm_kelas')
        ->where([
          'addmateris.no_induk'       =>Auth::user()->no_induk,
          'addmateris.id_kelas'       =>$pecah[0],
          'addmateris.id_mtk'         =>$pecah[1]
          ])->get();

        //video pemblajaran
        $datavideo =Addvideo::join('kelas', 'addvideos.id_kelas', '=', 'kelas.id')
        ->select('addvideos.*','kelas.nama as nm_kelas')
        ->where([
          'addvideos.no_induk'       =>Auth::user()->no_induk,
          'addvideos.id_kelas'       =>$pecah[0],
          'addvideos.id_mtk'         =>$pecah[1]
          ])
          // ->where('videos.created_at')
          ->get();
        
          //dump($pecah);
         return view('t_materi.index', compact('addmateri','user','datavideo','id'));
      }else{
        return redirect('/home');
    }
    
}
  public function create($id)
  {
    if(Auth::user()->status == 'G' or Auth::user()->status == 'A'){
      $user = User::where('id', Auth::user()->id)->first();

      $pecah=explode(',',Crypt::decryptString($id));

      $jadwals = Jadwal::join('kelas', 'jadwals.id_kelas', '=', 'kelas.id')
        ->select('jadwals.*','kelas.nama as nm_kelas')
        ->where([
          'jadwals.no_induk'       =>Auth::user()->no_induk,
          'jadwals.id_kelas'       =>$pecah[0],
          'jadwals.id_mtk'         =>$pecah[1]
     
          ])->first();

    return view('t_materi.create',compact('jadwals','id'));
  }else{
    return redirect('/home');
     }
  }

  public function create_video($id)
  {
    if(Auth::user()->status == 'G' or Auth::user()->status == 'A'){
      $user = User::where('id', Auth::user()->id)->first();

      $pecah=explode(',',Crypt::decryptString($id));
      $jadwal_v = Jadwal::join('kelas', 'jadwals.id_kelas', '=', 'kelas.id')
        ->select('jadwals.*','kelas.nama as nm_kelas')
        ->where([
        'jadwals.no_induk'       =>Auth::user()->no_induk,
        'jadwals.id_kelas'       =>$pecah[0],
        'jadwals.id_mtk'         =>$pecah[1]
   
        ])->first();


    return view('t_materi.create_video',compact('jadwal_v','id'));
  }else{
    return redirect('/home');
     }
  }

  public function store(Request $request)
  {
      //  materi tambahan
       $this->validate($request, [

        'no_induk'    => 'required',
        'id_kelas'    => 'required',
        'id_mtk'      => 'required',
        'judul'       => 'required',
        'des'         => 'required',
        'file'        => 'required',
       
    ]);

    $addmateri = Addmateri::create([

        'no_induk'      => $request->input('no_induk'),
        'id_kelas'      => $request->input('id_kelas'),
        'id_mtk'        => $request->input('id_mtk'),
        'judul'         => $request->input('judul'),
        'des'           => $request->input('des'),
        'file'          => $request->input('file')
       
       
    ]);
    
    // 0 => "1"
    // 1 => "11-001"
    // 2 => "201704121"
  
    $gabung=Crypt::encryptString($request->input('id_kelas').','.$request->input('id_mtk').','.$request->input('no_induk'));

    if($addmateri){
    return redirect('/elearning/addmateri/'.$gabung)->with('status','Data Ditambah');}
    else{
        return redirect('/elearning/addmateri/'.$gabung)->with('error','Gagal Ditambah');
    }
  }
  public function store_video(Request $request)
  {
      //  materi tambahan
       $this->validate($request, [

        'no_induk'    => 'required',
        'id_kelas'    => 'required',
        'id_mtk'      => 'required',
        'judul'       => 'required',
        'des'         => 'required',
        'link'        => 'required',
       
    ]);
    $addvideo = Addvideo::create([

        'no_induk'      => $request->input('no_induk'),
        'id_kelas'      => $request->input('id_kelas'),
        'id_mtk'        => $request->input('id_mtk'),
        'judul'         => $request->input('judul'),
        'des'           => $request->input('des'),
        'link'          => $request->input('link')
       
    ]);
    $gabung=Crypt::encryptString($request->input('id_kelas').','.$request->input('id_mtk').','.$request->input('no_induk'));

    if($addvideo){
    return redirect('/elearning/addmateri/'.$gabung)->with('status','Data Ditambah');}
    else{
        return redirect('/elearning/addmateri/'.$gabung)->with('error','Gagal Ditambah');
    }
  }

  public function destroy($id)
  {
    $addvideo = Addvideo::findOrFail($id);
    // dd($id_mtk);
    $addvideo->delete();
  
    if($addvideo){
      return response()->json([
        'status' => 'success'
      ]);
    }else{
      return response()->json([
        'status' => 'error'
      ]);
    }
  }
  public function destroy_materi($id)
  {
    $addmateri = Addmateri::findOrFail($id);
    // dd($id_mtk);
    $addmateri->delete();
  
    if($addmateri){
      return response()->json([
        'status' => 'success'
      ]);
    }else{
      return response()->json([
        'status' => 'error'
      ]);
    }
  }

}
