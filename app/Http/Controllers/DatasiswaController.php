<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datasiswa;
use App\Models\User;
use App\Exports\DatasiswaExport;
use App\Imports\DatasiswaImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;


class DatasiswaController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware(['permission:import_siswa.index|import_siswa.create|import_siswa.singkron|import_siswa.delete']);
    }
    public function index()
    {
		if(Auth::user()->status == 'G' or Auth::user()->status == 'A'){
		
		$datasiswa = DB::table('datasiswas')
		->join('kelas', 'datasiswas.id_kelas', '=', 'kelas.id')
		->select('kelas.nama','datasiswas.*', )
		->get();
        return view('datasiswa.index',compact('datasiswa'));
	}else{
		return redirect('/home');
	}
    }
    public function export_excel()
    {
        return Excel::download(new DatasiswaExport, 'siswa.xlsx');
    }
    public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_siswa',$nama_file);
 
		// import data
		Excel::import(new DatasiswaImport, public_path('/file_siswa/'.$nama_file));
 
		// notifikasi dengan session
		// Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect()->back()->with(['success' => 'success tersimpan']);
	}

	public function tuser()
    {
		// buat prosedur di db dengan nama "insert_user" 
		// Coding nya ada di -> database/catatan/insert_user.sql
        $temu = DB::select('call insert_user');
        return redirect()->back()->with(['success' => 'success singkron']);
    }
}
