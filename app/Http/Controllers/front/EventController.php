<?php

namespace App\Http\Controllers\front;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware(['permission:events.index|events.create|events.edit|events.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::latest()->when(request()->q, function($events) {
            $events = $events->where('title', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2000',
            'title'     => 'required',
            'content'   => 'required',
            'location'  => 'required',
            'date'      => 'required'
        ]);
        //upload image
        $image = $request->file('image');
        $image->storeAs('public/events', $image->hashName());

        $event = Event::create([
            'image'       => $image->hashName(),
            'title'     => $request->input('title'),
            'slug'      => Str::slug($request->input('title'), '-'),
            'content'   => $request->input('content'),
            'location'  => $request->input('location'),
            'date'      => $request->input('date')
        ]);

        if($event){
            //redirect dengan pesan sukses
            return redirect('/front/event')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect('/front/event')->with(['error' => 'Data Gagal Disimpan!']);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $this->validate($request, [
            'title'     => 'required',
            'content'   => 'required',
            'location'  => 'required',
            'date'      => 'required'
        ]);

        if ($request->file('image') == "") {

        $event = Event::findOrFail($event->id);
        $event->update([
            'title'     => $request->input('title'),
            'slug'      => Str::slug($request->input('title'), '-'),
            'content'   => $request->input('content'),
            'location'  => $request->input('location'),
            'date'      => $request->input('date')
        ]);
    } else {

        //remove old image
        Storage::disk('local')->delete('public/events/'.$event->image);

        //upload new image
        $image = $request->file('image');
        $image->storeAs('public/events', $image->hashName());

        $event = Event::findOrFail($event->id);
        $event->update([
            'image'       => $image->hashName(),
            'title'     => $request->input('title'),
            'slug'      => Str::slug($request->input('title'), '-'),
            'content'   => $request->input('content'),
            'location'  => $request->input('location'),
            'date'      => $request->input('date')
        ]);

    }

        if($event){
            //redirect dengan pesan sukses
            return redirect('/front/event')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect('/front/event')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        if($event){
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