<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Visimisi;
use App\Models\Sejarah;
use App\Models\Sambutan;
use App\Models\Event;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Post;
use App\Models\Priodedaftaranak;
use App\Models\Profilsekolah;
use App\Models\formulir_anak;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class FrontendController extends Controller
{
  public function index()
  {
    $berita = Post::orderBy('id', 'ASC')->limit(6)->get();
    $visi = visimisi::where('id', 1)->first();
    $sejarah = Sejarah::where('id', 1)->first();
    $profil= Profilsekolah::where('id', 1)->first();
    $sambutan= Sambutan::where('id', 1)->first();
    return view('my-seals.index',compact('berita','visi','sejarah','profil','sambutan'));
  }

  public function events()
  {
    $events = Event::all();
    $profil= Profilsekolah::where('id', 1)->first();
    return view('my-seals.events', compact('events','profil'));
  }

  public function events_detail($id)
  {
    $events = Event::where('id', $id)->first();
    $profil= Profilsekolah::where('id', 1)->first();
    return view('my-seals.events_detail', compact('events','profil','id'));
  }

  public function berita()
  {
    $berita_ex = Post::where('category_id',1)->get();
    $berita_ak = Post::where('category_id',2)->get();
    $berita_sp = Post::where('category_id',3)->get();
    $profil= Profilsekolah::where('id', 1)->first();
    return view('my-seals.berita', compact('berita_ex','profil','berita_ak','berita_sp'));
  }

  public function berita_detail($id)
  {
    $berita = Post::where('id', $id)->first();
    $profil= Profilsekolah::where('id', 1)->first();
    return view('my-seals.berita_detail', compact('berita','profil','id'));
  }

  public function photo()
  {
    $photo = Photo::all();
    $profil= Profilsekolah::where('id', 1)->first();
    return view('my-seals.gallery', compact('photo','profil'));
  }

  public function video()
  {
    $video = Video::all();
    $profil= Profilsekolah::where('id', 1)->first();
    return view('my-seals.video', compact('video','profil'));
  }

  public function daftar()
  {
    $profil= Profilsekolah::where('id', 1)->first();
    $priodeank=Priodedaftaranak::where('ket',1)->first();
    return view('my-seals.daftar',compact('profil','priodeank'));
  }
  public function sipp()
  {
    $profil= Profilsekolah::where('id', 1)->first();
    $priodeank=Priodedaftaranak::where('ket',1)->first();
      // Buat dua angka acak untuk CAPTCHA
      $num1 = rand(1, 10);
      $num2 = rand(1, 10);
  
      // Simpan jawaban CAPTCHA di session
      session(['captcha_answer' => $num1 + $num2]);

    return view('my-seals.daftar_anggota',compact('profil','priodeank','num1', 'num2'));
  }

  public function anak($id)
  {
    $profil= Profilsekolah::where('id', 1)->first();
    $pecah=explode(',',Crypt::decryptString($id));
    return view('my-seals.formulir_anak',compact('profil','id','pecah'));
  }
  public function dewasa($id)
  {
    $profil= Profilsekolah::where('id', 1)->first();
    $pecah=explode(',',Crypt::decryptString($id));
    return view('my-seals.formulir_dewasa',compact('profil','id','pecah'));
  }

  
}
