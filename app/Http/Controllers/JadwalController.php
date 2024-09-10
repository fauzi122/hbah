<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Materi;
use App\Models\Absen_siswa;
use App\Models\Absen_ajar;
use App\Models\Jadwal;
use App\Exports\JadwalExport;
use App\Imports\JadwalImport;
use Maatwebsite\Excel\Facades\Excel;

class JadwalController extends Controller
{
  public function __controller()
  {
  	$this->middleware('auth');
  }
  public function index() {
  	if(Auth::user()->status == 'G' or Auth::user()->status == 'A'){
	  	$user = User::where('id', Auth::user()->id)->first();

		  	$jadwal= 
			  Jadwal::join('kelas','jadwals.id_kelas', '=', 'kelas.id') 
			  ->select(
				  'jadwals.*',
				  'kelas.id',
				  'kelas.nama as nm_kelas')
			  ->where('jadwals.no_induk',Auth::user()->no_induk)
			  ->get();

	  	return view('jadwal.index', compact('user','jadwal'));
	  }else{
		return redirect('/home');
	  }
  }

	public function store(Request $request)
	{
	   $jam=date("H:i");
       $w_cek = ['id_kelas'=>$request->id_kelas,'id_mtk'=>$request->id_mtk,'jam_t'=>$request->jam_t];
  
	$absen_pert = Absen_ajar::where([
			'id_kelas'	=>$request->id_kelas,
			'id_mtk'	=>$request->id_mtk
		])->orderByDesc('pertemuan');

       $cek_absen = Absen_ajar::where([
		   'id_kelas'	=>$request->id_kelas,
		   'tgl_ajar'	=>date('Y-m-d'),
		   'id_mtk'		=>$request->id_mtk,
		   'jam_t'		=>$request->jam_t
		   ])->orderByDesc('pertemuan');

      if($absen_pert->count() > 0)
	  {
       		$temu=$absen_pert->first();
       		$jml_pert	=$temu->pertemuan+1;

       if($cek_absen->count()>0)
	   {
           $pert	=$temu->pertemuan;

       }
	   elseif($jml_pert=='8')
	   {
        	$pert	=$temu->pertemuan+2;
       }else{
            $pert	=$temu->pertemuan+1;
       }
   		}else{
           $pert='1';
   		}
   
		$absen_ajar = Absen_ajar::where([
			'id_kelas'	=>$request->id_kelas,
			'tgl_ajar'	=>date('Y-m-d'),
			'id_mtk'	=>$request->id_mtk,
			'jam_t'		=>$request->jam_t
			])->count();

   $cek_jam = app('App\Models\Absen_ajar')->cek_jam($w_cek,$jam)->first();
  
   if(isset($cek_jam)){
       if($absen_ajar < 1){
       Absen_ajar::create([
           'no_induk'		=>Auth::user()->no_induk,
           'id_kelas'		=>$request->id_kelas,
           'id_mtk'			=>$request->id_mtk,
           'nm_mtk'			=>$request->nm_mtk,
           'tgl_ajar'		=>date('Y-m-d'),
           'hari_ajar'		=>$request->hari,
           'jam_masuk'		=>date('H:i:s'),
           'ruang'			=>$request->ruang,
           'pertemuan'		=>$pert,
           'jam_t'			=>$request->jam_t
          ]);
       }
	 }else{
		 return redirect('/elearning/jadwal')->with('jam','Anda Belum Waktunya Masuk Kelas');
	 }
	 $id=Crypt::encryptString($request->id_mtk.','.$request->nm_mtk.',
	 '.$request->no_induk.','.$request->id_kelas.',
	 '.$request->hari.','.$request->jam_t.','.$request->ruang.','.$pert);

		return redirect('/elearning/jadwal/ajar/'.$id); 
		
	}

	public function ajar($id)
	{
		$request = explode(",",Crypt::decryptString($id)); 
   
        $w_showMhs = ['a.id_kelas'=>$request[3],'b.tgl_ajar'=>date('Y-m-d'),'b.id_mtk'=>$request[0],'b.jam_t'=>$request[5]];
        $w_showFoto = ['a.kode'=>$request[4],'b.tgl_ajar'=>date('Y-m-d'),'b.id_mtk'=>$request[0]];
        $mahasiswa = app('App\Models\Absen_ajar')->showMhs($w_showMhs);
        // $mhs_foto = app('App\Models\Absen_ajar')->mhs_foto($w_showFoto);      
		
		$temu_ajar = app('App\Models\Absen_ajar')->temu_ajar([
			'id_kelas'	=>$request[3],
			'tgl_ajar'	=>date('Y-m-d'),
			'id_mtk'	=>$request[0],
			'jam_t'		=>$request[5]]);

		$berita_acara=Absen_ajar::select(
			'pertemuan',
			'berita_acara',
			'id_kelas',
			'file_ajar',
			'jam_masuk',
			'jam_keluar')
        ->where([
			'id_kelas'	=>$request[3],
			'id_mtk'	=>$request[0]
		])->get();

		$absen_keluar = app('App\Models\Absen_ajar')->cek_bap([
			'id_kelas'	=>$request[3],
			'id_mtk'	=>$request[0],
			'tgl_ajar'	=>date('Y-m-d'),
			'jam_t'		=>$request[5]
			 ])->first();

		$jml_mhs = app('App\Models\Absen_ajar')->jumlah_mhs(
			$request[3]);

        $jml_hadir = app('App\Models\Absen_ajar')->jml_hadir(
			$request[3],
			$request[0],
			$request[7]);

        $mhs_hadir = app('App\Models\Absen_ajar')->mhs_hadir(
			$request[3],
			$request[0],
			$request[7]);

        $jadwal = Jadwal::join('kelas','jadwals.id_kelas','=','kelas.id')
		->select('jadwals.*','kelas.id','kelas.nama as nm_kelas')
		->where([
			'jadwals.id_mtk'	=>$request[0],
			'jadwals.id_kelas'	=>$request[3],
			'jadwals.jam_t'		=>$request[5]
			])->get();

        return view('jadwal.ajar',compact('mahasiswa','mhs_hadir','temu_ajar',
		'jadwal','jml_mhs','jml_hadir','berita_acara','id','absen_keluar'));
	}

	public function bap(Request $request)
    {
        $request->validate([
           
            'bap' => 'required',
            'file' => 'required|file|mimes:pdf,jpeg,jpg,doc,docx,|max:2000',

            ]);
            $exp = explode(",",Crypt::decryptString($request->id));
           
        $bap=Absen_ajar::select('file_ajar')->where([
            'no_induk'		=>Auth::user()->no_induk,
			'id_kelas'		=>$request->id_kelas,
			'id_mtk'		=>$exp[0],
			'tgl_ajar'		=>date('Y-m-d'),
			'jam_t'			=>$exp[5]])->first();
        
        Storage::delete('public/ajar/'.$bap->file_ajar);
        $file = $request->file('file');
        $file->storeAs('public/ajar', $file->hashName());
       
        $simpan=Absen_ajar::where([
			'no_induk'		=>Auth::user()->no_induk,
			'id_kelas'		=>$request->id_kelas,
			'id_mtk'		=>$exp[0],
			'tgl_ajar'		=>date('Y-m-d'),
			'jam_t'			=>$exp[5]])
        
		->update([
            'berita_acara'	=>$request->bap,
            'file_ajar'		=>$file->hashName()]);

        if ($simpan) {
            return redirect('/elearning/jadwal/ajar/'.$request->id)
			->with(['success' => 'Upload success']);
        }else{
			return redirect('/elearning/jadwal/ajar/'.$request->id)
			->with(['error' => 'Please choose file before']);

        }

                    
    }


}
