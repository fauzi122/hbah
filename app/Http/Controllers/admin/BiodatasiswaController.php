<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biodatasiswa;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BiodatasiswaImport;


class BiodatasiswaController extends Controller
{
    public function __controller()
    {
        $this->middleware('auth');
        // $this->middleware(['permission:import_jadwal.index|import_jadwal.create|import_jadwal.edit|import_jadwal.delete']);

    }
    public function index()
    {
        $biodata = Biodatasiswa::get();
        return view('biodata.index',compact('biodata'));
    }

	public function show($id)
	{
		$biodata = Biodatasiswa::join('users', 'biodatasiswas.nisn','users.nisn')
		->select('biodatasiswas.*','users.gambar')
		->where('biodatasiswas.id',$id)->first();
		return view('biodata.show',compact('biodata'));
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
		$file->move('file_biodata',$nama_file);
		Excel::import(new BiodatasiswaImport, public_path('/file_biodata/'.$nama_file));
 
		// notifikasi dengan session
        return redirect()->back()->with(['success' => 'success tersimpan']);
 
		// alihkan halaman kembali
		return redirect('/biodata');
	}
	public function destroy($id)
	{
		  
	$biodata = Biodatasiswa::findOrFail($id);
	// dd($id_mtk);
	$biodata->delete();

	if($biodata){
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
