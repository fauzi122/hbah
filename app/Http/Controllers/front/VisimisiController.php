<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Visimisi;

class VisimisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    //     $this->middleware(['permission:visimisis.index|visimisis.create|visimisis.edit|visimisis.delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visimisis = Visimisi::all();
        return view('admin.visimisi.index',compact('visimisis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.visimisi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul_v'   =>'required',
            'visi'      =>'required',
            'judul_m'   =>'required',
            'misi'      =>'required',

        ]);
        $visimisis = Visimisi::create([
            'judul_v'   => $request->input('judul_v'),
            'visi'      => $request->input('visi'),
            'judul_m'   => $request->input('judul_m'),
            'misi'      => $request->input('misi')

        ]);

        if($visimisis){
        return redirect()->route('admin.visimisi.index')->route('admin.visimisi.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
        //redirect dengan pesan error
        return redirect()->route('admin.visimisi.index')->with(['error' => 'Data Gagal Disimpan!']);
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
    public function edit(Visimisi $visimisi)
    {
        return view('admin.visimisi.edit',compact('visimisi'));
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
        $visimisi = Visimisi::findOrfail($id);
        $visimisi->delete();
        if ($visimisi) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }

    }
}
