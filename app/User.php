<?php

namespace App;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_induk','nama','gambar', 'email', 
        'password','id_kelas'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
  public function getKelas()
  {
    return $this->belongsTo('App\Models\Kelas', 'id_kelas');
  }

  public function simpanGuru($request)
  {
    if ($request->nama == "") {
      return "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Nama tidak boleh kosong!";
    } elseif ($request->email == "") {
      return "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Email tidak boleh kosong!";
    } elseif (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
      return "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Email tidak valid!";
    } elseif ($request->password == "") {
      return "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Password tidak boleh kosong!";
    } elseif ($request->jk == "") {
      return "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Jenis kelamin tidak boleh kosong!";
    } else {
      $cek_email = User::where('id', '!=', $request->id)->where('email', $request->email)->first();
      if ($cek_email != "") {
        return "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Email sudah terdaftar, silahkan ganti dengan yang lain!";
      } else {
        if ($request->id == 'N') {
          $query = new User;
          $query->password = bcrypt($request->password);
          if ($request->no_induk == "") {
            $query->no_induk = '-';
          } else {
            $query->no_induk = $request->no_induk;
          }
        } else {
          $query = User::where('id', $request->id)->first();
          if ($request->password != "") {
            $query->password = bcrypt($request->password);
          }
          $query->no_induk = $request->no_induk;
        }
        $query->nama = $request->nama;
        $query->email = $request->email;
        $query->jk = $request->jk;
        $query->status = "G";
        if ($query->save()) {
          return 'ok';
        }
      }
    }
  }
}
