<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Exports\JadwalExport;
use App\Imports\JadwalImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ImportJadwalController extends Controller
{
    public function __controller()
    {
        $this->middleware('auth');
        $this->middleware(['permission:import_jadwal.index|import_jadwal.create|import_jadwal.edit|import_jadwal.delete']);

    }

    public function index()
    {
        $jadwal = Jadwal::all();
        return view('importjadwal.index',compact('jadwal'));
    }

    public function export_excel()
    {
        return Excel::download(new JadwalExport, 'jadwal.xlsx');
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
		$file->move('file_jadwal',$nama_file);
		Excel::import(new JadwalImport, public_path('/file_jadwal/'.$nama_file));
 
		// notifikasi dengan session
        return redirect()->back()->with(['success' => 'success tersimpan']);
 
		// alihkan halaman kembali
		return redirect('/datajawal');
	}

    public function tjadwal()
    {
        $temu = DB::select('call t_jadwal');
        return redirect()->back()->with(['success' => 'success terhapus']);
    }
    
    
}
