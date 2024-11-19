<?php
namespace App\Http\Controllers;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\front\EventController;
use App\Http\Controllers\front\PendaftarananakController;
use App\Http\Controllers\front\PhotoController;
use App\Http\Controllers\front\PriodedaftarController;
use App\Http\Controllers\front\PostController;
use App\Http\Controllers\front\VideoController;
use App\Http\Controllers\front\PriodedaftulangController;
use App\Http\Controllers\front\PendaftardewasaController;
use App\Http\Controllers\front\ProfilController;
use App\Http\Controllers\admin\SippController;
use App\Http\Controllers\admin\DaftarulangController;
use App\Http\Controllers\KelasController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('beranda');
    Route::get('/events', 'events')->name('events');
    Route::get('/events-detail/{id}', 'events_detail');
    Route::get('/donasi', 'berita')->name('berita');
    Route::get('/berita-detail/{id}', 'berita_detail');
    Route::get('/gallery', 'photo')->name('gallery');
    Route::get('/video', 'video')->name('video');
    Route::get('/daftar', 'daftar')->name('daftar');
    Route::get('/form/pendaftaran-anak/{id}', 'anak');
    Route::get('/form/pendaftaran-dewasa/{id}', 'dewasa');
    Route::get('/form/pendaftaran-sipp', 'sipp')->name('sipp');
});
Route::controller(BusinessRegistrationController::class)->group(function () {
    Route::post('/store/form/pendaftaran-sipp', 'processForm')->middleware('throttle:form-submission');
});

Route::view('/sarpras', 'my-seals.events')->name('sarpras');

Route::controller(formulir\FormuliranakController::class)->group(function () {
    Route::post('/form/pendaftaran-anak', 'store');
});

Route::controller(formulir\FormulirdewasaController::class)->group(function () {
    Route::post('/form/pendaftaran-dewasa', 'store')->middleware('throttle:10,1');
});




Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');


// Route group for CRUD operations
Route::prefix('crud')->group(function () {
    Route::controller(SoalController::class)->group(function () {
        Route::post('update-soal', 'updateSoal');
        Route::post('simpan-detail-soal', 'simpanDetailSoal');
        Route::post('simpan-detail-soal-via-excel', 'simpanDetailSoalExcel');
    });

    Route::controller(CrudController::class)->group(function () {
        Route::post('update-profil', 'updateProfil');
        Route::post('simpan-materi', 'simpanMateri');
        Route::post('terbit-soal', 'terbitSoal');
        Route::post('simpan-gambar-materi', 'simpanGambarMateri');
        Route::post('hapus-gambar-materi', 'hapusGambarMateri');
        Route::post('simpan-gambar-user', 'simpanGambarUser');
        Route::post('update-profil-sekolah', 'updateProfilSekolah');
        Route::post('simpan-siswa', 'simpanSiswa');
        Route::post('update-siswa', 'updateSiswa');
        Route::post('simpan-siswa-via-excel', 'simpanSiswaViaExcel');
        Route::post('update-img-siswa', 'updateImgSiswa');
        Route::post('delete-siswa', 'deleteSiswa');
        Route::post('update-guru', 'updateGuru');
        Route::post('delete-guru', 'deleteGuru');
        Route::post('simpan-kelas', 'simpanKelas');
        Route::delete('delete-kelas/{id}', 'deleteKelas');
        Route::post('reset-ujian', 'resetUjian');
        Route::patch('/update/{user}', 'update_profil');
    });

    Route::controller(GuruController::class)->group(function () {
        Route::post('simpan-guru', 'simpanGuru');
    });
});


Route::prefix('front')->group(function () {	
    Route::controller(front\PhotoController::class)->group(function () {
        Route::resource('/photo', PhotoController::class, ['except' => ['show', 'create', 'edit', 'update']]);
    });

    Route::controller(front\VideoController::class)->group(function () {
        Route::resource('/video', VideoController::class, ['except' => 'show']);
    });
    Route::controller(admin\SippController::class)->group(function () {
        Route::resource('/sipp', SippController::class, ['except' => 'show']);
    });

    Route::controller(front\PostController::class)->group(function () {
        Route::resource('/post', PostController::class, ['except' => 'show']);
    });

    Route::controller(front\EventController::class)->group(function () {
        Route::resource('/event', EventController::class, ['except' => 'show']);
    });

    Route::controller(front\ProfilController::class)->group(function () {
        Route::resource('/profil', ProfilController::class, ['except' => 'show']);
        Route::get('/edit/{id}', 'edit_sambutan');
        Route::get('/edit-visimisi/{id}', 'edit_visimisi');
        Route::get('/edit-sejarah/{id}', 'edit_sejarah');
        Route::patch('/update-sejarah/{sejarah}', 'update_sejarah');
        Route::patch('/update-visimisi/{visimisi}', 'update_visimisi');
        Route::patch('/update/{sambutan}', 'update_sambutan');
    });

    Route::controller(front\PriodedaftarController::class)->group(function () {
        Route::resource('/priode-daftar', PriodedaftarController::class, ['except' => ['store', 'index_infaq']]);
        Route::get('/priode/pendaftaran', 'index_infaq');
        Route::post('/priode-daftar', 'store');
    });

    Route::controller(front\PriodedaftulangController::class)->group(function () {
        Route::resource('/priode-ulang', PriodedaftulangController::class, ['except' => 'store']);
        Route::post('/priode-ulang', 'store');
    });

    Route::controller(front\PendaftarananakController::class)->group(function () {
        Route::resource('/daftar-anak', PendaftarananakController::class, ['except' => ['show', 'index']]);
        Route::get('/daftar-anak/{id}', 'index');
        Route::get('/daftar-anak/{id}/show', 'show');
    });

    Route::controller(front\PendaftardewasaController::class)->group(function () {
        Route::resource('/daftar-dewasa', PendaftardewasaController::class, ['except' => ['show', 'index']]);
        Route::get('/daftar-dewasa/{id}', 'index');
        Route::get('/daftar-dewasa/{id}/show', 'show');
    });

    Route::controller(admin\DaftarulangController::class)->group(function () {
        Route::resource('/daftar-ulang', DaftarulangController::class, ['except' => ['show', 'index']]);
        Route::get('/daftar-ulang/{id}', 'index');
    });
});

Route::prefix('infaq')->group(function () {
    Route::controller(infaq\daftar\InfaqController::class)->group(function () {
        Route::get('/pendaftaran/{id}', 'index');
    });

    Route::controller(infaq\daftar\InfaqdafsantriController::class)->group(function () {
        Route::get('/daftar/anak/{id}', 'index');
        Route::get('/daftar/dewasa/{id}', 'index_d');
        Route::post('/daftar', 'store');
    });

    Route::controller(infaq\ulang\InfaqulangsantriController::class)->group(function () {
        Route::get('/ulang/{id}', 'index');
        Route::post('/ulang', 'store');
    });
});


Route::prefix('akses')->group(function () {
    Route::controller(PermissionController::class)->group(function () {
        Route::get('/permission', 'index');
        Route::get('/permission-create', 'create');
        Route::post('/permission', 'store');
    });

    Route::controller(RoleController::class)->group(function () {
        Route::get('/role', 'index');
        Route::get('/role-create', 'create');
        Route::post('/role', 'store');
        Route::get('/role/edit/{role}', 'edit');
        Route::patch('/role/update/{role}', 'update');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index');
        Route::get('/user/edit/{user}', 'edit');
        Route::patch('/user/update/{user}', 'update');
    });
});

Route::prefix('data')->group(function () {
    Route::controller(DatasiswaController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/export_excel', 'export_excel');
        Route::post('/import_excel', 'import_excel');
        Route::post('/singkron-user', 'tuser');
    });
});

Route::prefix('datajawal')->group(function () {
    Route::controller(admin\ImportJadwalController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/export_excel', 'export_excel');
        Route::post('/import_excel', 'import_excel');
        Route::post('/tran', 'tjadwal');
    });
});

Route::prefix('biodata')->group(function () {
    Route::controller(admin\BiodatasiswaController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/show/{id}', 'show');
        Route::delete('/destroy/{id}', 'destroy');
        Route::post('/import_excel', 'import_excel');
    });

    Route::controller(admin\BiodatasantriController::class)->group(function () {
        Route::get('/santri', 'index');
        Route::get('/santri-show/{id}', 'show');
    });
});

Route::prefix('mapel')->group(function () {
    Route::controller(MateriController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::get('/export_excel', 'export_excel');
        Route::post('/import_excel', 'import_excel');
        Route::post('/', 'store');
        Route::delete('/destroy/{id}', 'destroy');
    });
});

Route::prefix('brita-acara')->group(function () {
    Route::controller(Beritaacaraujian::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create');
    });
});

Route::prefix('pengaturan')->group(function () {
    Route::get('/', [HomeController::class, 'pengaturan'])->name('pengaturan');
});

Route::prefix('master')->group(function () {
    Route::prefix('guru')->group(function () {
        Route::controller(GuruController::class)->group(function () {
            Route::get('/', 'index')->name('master.guru');
            Route::get('data-guru', 'dataGuru')->name('master.data_guru');
            Route::get('detail/{id}', 'detailGuru')->name('master.detail_guru');
            Route::get('ubah/{id}', 'ubahGuru')->name('master.ubah_guru');
            Route::patch('update/{id}', 'update')->name('guru.update');
        });
    });

    Route::prefix('kelas')->group(function () {
        Route::controller(KelasController::class)->group(function () {
            Route::get('/', 'index')->name('master.kelas');
            Route::get('data-kelas', 'dataKelas')->name('master.data_kelas'); // Route untuk data kelas
            Route::get('detail/{id}', 'detailKelas')->name('master.detail_kelas');
            Route::get('detail-kelas', 'detailKelasSiswa')->name('master.detail_kelas_siswa'); // Beri path yang berbeda
            Route::get('ubah/{id}', 'ubahKelas')->name('master.ubah_kelas');
        });
    });
    

    Route::prefix('siswa')->group(function () {
        Route::controller(SiswaController::class)->group(function () {
            Route::get('/', 'index')->name('master.siswa'); // konsisten dengan prefix master
            Route::get('data-siswa', 'dataSiswa')->name('master.data_siswa');
            Route::get('detail/{id}', 'detailSiswa')->name('master.detail_siswa');
            Route::get('edit/{id}', 'editSiswa')->name('master.edit_siswa');
            
            // Untuk delete, gunakan POST atau DELETE
            Route::delete('delete/{id}', 'deleteSiswa')->name('master.delete_siswa'); 
            Route::delete('delete-all', 'deleteAll')->name('master.delete_all_siswa');

            Route::get('get-btn-delete/{password}', 'getBtnDelete')->name('master.get_btn_delete_siswa'); 
        });
    });
});


Route::prefix('elearning')->group(function () {
    Route::prefix('addmateri')->group(function () {
        Route::controller(AddmateriController::class)->group(function () {
            Route::get('/{id}', 'index');
            Route::get('/create/{id}', 'create')->name('elearning.createmateri');
            Route::get('/create-video/{id}', 'create_video')->name('elearning.createvideo');
            Route::post('/', 'store');
            Route::post('/video', 'store_video');
            Route::delete('/destroy-video/{id}', 'destroy');
            Route::delete('/destroy/{id}', 'destroy_materi');
        });
    });

    Route::prefix('tugas')->group(function () {
        Route::controller(TugasController::class)->group(function () {
            Route::get('/{id}', 'index');
            Route::get('/create/{id}', 'create')->name('elearning.createtugas');
            Route::post('/', 'store');
            Route::get('/lihat/{id}', 'show');
            Route::delete('/destroy/{id}', 'destroy');
            Route::post('/send', 'send_tugas');
        });
    });

    Route::prefix('jadwal')->group(function () {
        Route::controller(JadwalController::class)->group(function () {
            Route::get('/', 'index')->name('elearning.jadwal');
            Route::post('/store', 'store');
            Route::get('/ajar/{id}', 'ajar')->name('elearning.ajar');
            Route::post('/bap-store', 'bap');
            Route::get('/absen-keluar/{id}', 'absen_keluar')->name('elearning.absen_keluar');
        });
    });

    Route::prefix('latihan')->group(function () {
        Route::controller(LatihanujianController::class)->group(function () {
            Route::get('/', 'index')->name('elearning.latihan');
            Route::get('/create', 'create')->name('elearning.latihan-create');
            Route::post('/', 'store');
            Route::get('/get-latihan', 'dataSoal')->name('elearning.get-latihan');
        });
    });

    Route::prefix('absen')->group(function () {
        Route::controller(guru\Rekap_absenController::class)->group(function () {
            Route::get('/', 'index')->name('elearning.absen');
        });
    });

    Route::prefix('laporan')->group(function () {
        Route::controller(LaporanController::class)->group(function () {
            Route::get('/', 'index')->name('elearning.laporan');
            Route::get('/detail-kelas/{id}', 'detailKelas')->name('elearning.laporan');
            Route::get('data-paket-soal', 'data_paket_soal')->name('elearning.laporan.data_paket_soal');
            Route::get('detail-kelas/{id_kelas}/paket-soal/{id_soal}', 'detailPaketSoalPerKelas');
            Route::get('data-kelas-paket-soal', 'dataKelasPaketSoal')->name('elearning.laporan.data_kelas_paket_soal');
            Route::get('{id_soal}/{id_user}', 'detailLaporanSiswa')->name('elearning.detailLaporanSiswa');
            Route::get('hasil-siswa', 'hasilSiswa')->name('elearning.hasilSiswa');
        });
    });

    Route::prefix('soal')->group(function () {
        Route::controller(SoalController::class)->group(function () {
            Route::get('/', 'index')->name('soal');
            Route::get('/uas', 'uas')->name('soal');
            Route::get('/create-uts', 'create_uts')->name('create-uts');
            Route::get('/create-uas', 'create_uas')->name('create-uas');
            Route::post('/', 'simpanSoal');
            Route::post('/uas', 'simpanSoaluas');
            Route::get('/ubah/{id}', 'ubahSoal')->name('soal.ubah');
            Route::put('/update', 'update_soal');
            Route::get('/detail/{id}', 'detail')->name('elearning.detail-soal');
            Route::get('/get-soal', 'dataSoal')->name('elearning.get-soal');
            Route::get('/get-soaluas', 'dataSoaluas')->name('elearning.get-soaluas');
            Route::get('/get-detail-soal', 'dataDetailSoal')->name('elearning.get-detail-soal');
            Route::get('/detail/ubah/{id}', 'ubahDetailSoal')->name('elearning.ubah-detail-soal');
            Route::get('/detail/data-soal/{id}', 'detailDataSoal')->name('elearning.detail-data-soal');
            Route::get('/essay/data', 'DetailSoalEssayController@data');
            Route::get('/essay/simpan-score', 'JawabController@simpanScore');
            Route::resource('/essay', DetailSoalEssayController::class);
        });
    });
});

Route::get('/download-file-format/{filename}', [DownloadController::class, 'download'])->name('download');

Route::prefix('cetak')->group(function () {
    Route::controller(KartuujiController::class)->group(function () {
        Route::get('/kartu-ujian', 'index');
        Route::get('/create-data', 'create');
        Route::get('/export_excel', 'export_excel');
        Route::post('/import_excel', 'import_excel');
        Route::post('/simpan', 'store');
        Route::get('ubah/{id}', 'ubah');
        Route::post('update-kartu', 'update_data');
        Route::get('data-kartu', 'datakartu')->name('cetak.data_kartu');
        Route::get('kelas/ubah/{id}', 'ubahKelas')->name('master.ubah_kelas');
    });
    
    Route::controller(LaporanController::class)->group(function () {
        Route::get('/berita-acara', 'e404')->name('soal');
        Route::get('/excel/hasil-ujian-perkelas/{soal}/{kelas}', 'excelHasilUjianPerkelas');
        Route::get('/pdf/hasil-ujian-persiswa/{siswa}/{soal}', 'pdfHasilUjianPersiswa');
    });
});

Route::get('/activity', [HomeController::class, 'activity']);

Route::prefix('siswa')->group(function () {
    Route::controller(SiswaController::class)->group(function () {
        Route::get('data-materi', 'dataMateri')->name('siswa.materi');
        Route::get('materi/detail/{id}', 'detailMateri');
        Route::get('ujian', 'ujian');
        Route::get('uts', 'ujian_uts');
        Route::get('uas', 'ujian_uas');
        Route::get('ujian/get-detail-essay', 'getDetailEssay');
        Route::get('ujian/simpan-jawaban-essay', 'simpanJawabanEssay');
        Route::get('ujian/detail/{id}', 'detailUjian');
        Route::get('ujian/finish/{id}', 'finishUjian');
        Route::get('ujian/get-soal/{id}', 'getSoal');
        Route::post('ujian/jawab', 'jawab');
        Route::post('ujian/kirim-jawaban', 'kirimJawaban');
    });

    Route::prefix('jadwal')->group(function () {
        Route::controller(siswa\JadwalsController::class)->group(function () {
            Route::get('/jadwal', 'index');
            Route::get('/absen/{id}', 'show');
        });
    });

    Route::prefix('tugas')->group(function () {
        Route::controller(siswa\TugasController::class)->group(function () {
            Route::get('/tugas/{id}', 'index');
            Route::get('/send/{id}', 'send');
            Route::post('/tugas/', 'store');
        });
    });

    Route::controller(siswa\MateribelajarController::class)->group(function () {
        Route::get('/materi-belajar/{id}', 'index');
    });

    Route::prefix('ulang')->group(function () {
        Route::controller(siswa\ulang\DaftarulangController::class)->group(function () {
            Route::get('/daftar-ulang', 'index');
            Route::get('/verifikasi-ulang/{id}', 'create');
            Route::post('/daftar-ulang', 'store');
        });
    });

    Route::prefix('aturan')->group(function () {
        Route::get('/', [AturanController::class, 'index']);
    });
});

require __DIR__.'/auth.php';
