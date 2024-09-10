<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sarpas;
use Illuminate\Support\Facades\Storage;


class SarpasController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['permission:sarpas.index|sarpas.create|sarpas.edit|sarpas.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sarpas = Sarpas::all();
        return view('admin.sarpas.index', compact('sarpas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sarpas.create');
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
            'image'     => 'required|image|mimes:png,jpg,jepg,JPG|max:2000',
            'caption'   => 'required|max:30'
        ]);

        //upload img
        $image = $request->file('image');
        $image->storeAs('public/sarpas',$image->hashName());

        $sarpas= Sarpas::create([
            'image' => $image->hashName(),
            'caption' => $request->input('caption')

            ]);
        if($sarpas){
            
            return redirect()->route('admin.sarpas.index')->with(['succes' =>'Berhasil Di Simapan']);  
        } else{
            return redirect()->route('admin.sarpas.index')->with(['error' 
            =>'Gagal Di Simapan']);  

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
        $sarpas = Sarpas::findOrFail($id);
        $image = Storage::disk('local')->delete('public/sarpas/' . $sarpas->image);
        $sarpas->delete();

        if ($sarpas) {
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
