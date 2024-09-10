<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tes;
 
use App\Exports\TesExport;
use App\Imports\TesImport;
use Maatwebsite\Excel\Facades\Excel;
class TesController extends Controller
{
    public function index()
    {
        $tes = tes::all();
        return view('tes.index',compact('tes'));
    }
    public function export_excel()
    {
        return Excel::download(new TesExport, 'siswa.xlsx');
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
		Excel::import(new TesImport, public_path('/file_siswa/'.$nama_file));
 
		// notifikasi dengan session
		// Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/data');
	}
    
}
