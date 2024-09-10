<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\School;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;



Carbon::setLocale('id');

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function pengaturan()
    {
      $user = User::findorfail(Auth::user()->id);
      return view('pengaturan.index', compact('user'));
    }


    public function activity()
    {
      return view('errors.404');
    }
  
}
