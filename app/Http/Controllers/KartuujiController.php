<?php

namespace App\Http\Controllers;


use App\Models\Kelas;
use App\Models\User;
use App\Models\Kartuuji;
use Illuminate\Http\Request;
use App\Exports\KartuujiExport;
use App\Imports\KartuujiImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;


class KartuujiController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->status == 'A') {
            $kartu = Kartuuji::where('status', ['1', '2'])->get();
            $kelas = Kelas::get();
            return view('kartu.index', compact('kartu','kelas'));
          } else {
            return redirect('/home');
          }
    }

    public function datakartu()
  {
    $kartus = Kartuuji::where('status', ['1', '2']);
    if (auth()->user()->status == 'A') {
      return DataTables::of($kartus)
        ->addColumn('kelas', function ($kartus) {
          return 'ini kelas';
        })
        ->editColumn('status', function ($kartus) {
          if ($kartus->status == '1') {
            return '1';
          } else {
            return '2';
          }
        })
      
        ->addColumn('action', function ($kartus) {
          return '<div style="text-align:center">
                              <a href="/cetak/ubah/' . $kartus->no_induk . '" class="btn btn-xs btn-primary">Ubah</a>
                              <button type="button" class="btn btn-xs btn-danger del-siswa" id="' . $kartus->id . '">Hapus</button>
                              
                            </div>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }
  }
  public function export_excel()
  {
      return Excel::download(new KartuujiExport, 'kartuujian.xlsx');
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
		$file->move('file_kartuujian',$nama_file);
 
		// import data
		Excel::import(new KartuujiImport, public_path('/file_kartuujian/'.$nama_file));
 
		// notifikasi dengan session
		// Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/cetak/kartu-ujian');
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (auth()->user()->status == 'A') {
        $kelas = Kelas::get();
        return view('kartu.create_siswa', compact('kelas'));
      } else {
        return redirect('/home');
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  materi tambahan
       $this->validate($request, [

        'no_induk'    => 'required',
        'nama'        => 'required',
        'kls'         => 'required',
        'status'      => 'required',
       
    ]);
    $addvideo = Kartuuji::create([

        'no_induk'    => $request->input('no_induk'),
        'nama'        => $request->input('nama'),
        'kls'         => $request->input('kls'),
        'status'      => $request->input('status')
      
    ]);

    if($addvideo){
    return redirect('/cetak/kartu-ujian')->with('status','Data Ditambah');}
    else{
        return redirect('/cetak/kartu-ujian')->with('error','Gagal Ditambah');
    }
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ubah($id)
    {
      if (Auth::user()->status == 'G' or Auth::user()->status == 'A') {
        $user = User::where('id', Auth::user()->id)->first();
        $kelas = Kelas::get();
        $kartu = Kartuuji::where('no_induk', $id)->first();
        return view('kartu.edit', compact('user', 'kartu','kelas'));
      } else {
        return redirect('/home');
      }
    }
    public function update_data(Request $request, Kartuuji $kartuuji)
    {
      $this->validate($request, [
        'status' => 'required', 
        'kls'    => 'required' 
    ]);

    $kartuuji = Kartuuji::findOrFail($kartuuji->no_induk);
    $kartuuji->update([
        'status' => $request->input('status'),
        'kls'    => $request->input('kls'),
        
    ]);
    if ($kartuuji) {
      //redirect dengan pesan sukses
      return redirect()->route('kartu.index')->with(['success' => 'Data Berhasil Diupdate!']);
  } else {
      //redirect dengan pesan error
      return redirect()->route('kartu.index')->with(['error' => 'Data Gagal Diupdate!']);
  }
    }

    
}
