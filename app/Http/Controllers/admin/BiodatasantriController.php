<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BiosantriImport;
use Illuminate\Http\Request;
use App\Models\Biosantri;

class BiodatasantriController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware(['permission:posts.index|posts.create|posts.edit|posts.delete']);
    }
    public function index()
    {
        $biodata = Biosantri::get();
        return view('biodata.santri.index',compact('biodata'));
    }

    public function show($id)
	{
		$biodata = Biosantri::join('users', 'biosantris.no_induk','users.no_induk')
		->select('biosantris.*','users.gambar')
		->where('biosantris.no_induk',$id)->first();
		// dd($biodata);
		return view('biodata.santri.show',compact('biodata'));
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
		Excel::import(new BiosantriImport, public_path('/file_biodata/'.$nama_file));
 
		// notifikasi dengan session
        return redirect()->back()->with(['success' => 'success tersimpan']);
 
		// alihkan halaman kembali
		return redirect('/biodata');
	}
}
