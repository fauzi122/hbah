<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\Daftarulang;
use App\User;

class DaftarulangController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware(['permission:posts.index|posts.create|posts.edit|posts.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $pecah=explode(',',Crypt::decryptString($id));

        if(Auth::user()->status == 'G' or Auth::user()->status == 'A'){
            $user = User::where('id', Auth::user()->id)->first();
    
        $ulang = User::leftjoin('daftarulangs','users.no_induk','=','daftarulangs.no_induk')
        ->leftjoin('kelas','users.id_kelas','=','kelas.id')
        ->select(
                 'daftarulangs.*',
                 'users.no_induk as nim',
                 'users.nama',
                 'kelas.nama as nm_kls'
                 )
        ->where('users.status',['s','S'])
        ->where('users.status_sekolah',['y','Y'])
        ->where([
            'daftarulangs.id_priode' =>$pecah[0]
            ])
        ->orderBy('daftarulangs.created_at', 'DESC')
        ->get();


        $t_ulang = User::leftjoin('kelas','users.id_kelas','=','kelas.id')
        ->select(['users.no_induk','users.nama','kelas.nama as nm_kls'])
        ->whereNotIn('no_induk', static function ($query) {
            $query->select(['no_induk'])
                ->from((new Daftarulang)->getTable());
        })
        ->where('users.status',['s','S'])
        ->where('users.status_sekolah',['y','Y'])
        ->get();

        return view('admin.daftar.daftarulang.index',compact('ulang','user','id','t_ulang'));
    
        }else{
            return redirect('/home');
        }

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
        // $formank = formulir_anak::where('id',$id)->first();
        // return view('admin.daftar.show', compact('formank'));
    }
 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $post = formulir_anak::findOrFail($id);
       
        // $post->delete();

        // if($post){
        //     return response()->json([
        //         'status' => 'success'
        //     ]);
        // }else{
        //     return response()->json([
        //         'status' => 'error'
        //     ]);
        // }
    }
}