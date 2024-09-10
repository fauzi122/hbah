<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Yajra\DataTables\Facades\DataTables;
use DB;

use App\User;
use App\Models\Mapel;
use App\Exports\MapelExport;
use App\Imports\MapelImport;
use Maatwebsite\Excel\Facades\Excel;

class MateriController extends Controller
{
  public function __controller()
  {
  	$this->middleware('auth');
  }
  public function index() {
  	if(Auth::user()->status == 'A' or Auth::user()->status == 'G'){
	  	$user = User::where('id', Auth::user()->id)->first();
		$materi = Mapel::get();
	  	return view('mapel.index', compact('user','materi'));
	  }else{
	  return redirect('/home');
	  }
  }

  public function create()
  {
	return view('mapel.create');
  }

  public function store(Request $request)
  {
	$this->validate($request, [
		'id_mtk'     => 'required',
		'nm_mtk'      => 'required'
	]);
	$materi = Mapel::create([
	
		'id_mtk'     => $request->input('id_mtk'),
		'nm_mtk'      => $request->input('nm_mtk')
	]);

	if($materi){
		//redirect dengan pesan sukses
		return redirect('/mapel')->with(['success' => 'Data Berhasil Disimpan!']);
	}else{
		//redirect dengan pesan error
		return redirect('/mapel')->with(['error' => 'Data Gagal Disimpan!']);
	}
  }

  public function ubah(Request $request)
  {
  	if(Auth::user()->status == 'G' or Auth::user()->status == 'A'){
	  	$user = User::where('id', Auth::user()->id)->first();
	  	$materi = Mapel::where('id', $request->id)->first();
	  	return view('materi.form.ubah', compact('user', 'materi'));
	  }else{
	  return redirect('/home');
	  }
  }
  public function export_excel()
  {
	  return Excel::download(new MapelExport, 'mapel.xlsx');
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
	  $file->move('file_mapel',$nama_file);
	  Excel::import(new MapelImport, public_path('/file_mapel/'.$nama_file));

	  return redirect('/mapel')->with(['success' => 'Data Berhasil Disimpan!']);
  }

  public function destroy($id)
  {
	  
	$materi = Mapel::findOrFail($id);
	// dd($id_mtk);
	$materi->delete();

	if($materi){
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
