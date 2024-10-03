<?php

if (!function_exists('getStatus')) {
    function getStatus($status)
    {
        if ($status != "") {
            if ($status == 'A') {
                return 'Admin / Operator Sekolah';
            } elseif ($status == 'G') {
                return 'Guru';
            } elseif ($status == 'C') {
                return 'Calon siswa';
            } else {
                return 'Siswa';
            }
        } else {
            return 'Invalid';
        }
    }
}

if (!function_exists('getJenisSoal')) {
    function getJenisSoal($j)
    {
        if ($j != "") {
            if ($j == '1') {
                return 'Soal Ujian';
            } elseif ($j == '2') {
                return 'Soal Latihan';
            }
        } else {
            return 'Invalid';
        }
    }
}

if (!function_exists('timeStampIndo')) {
    function timeStampIndo($tgl)
    {
        if ($tgl != "") {
            $exp_tgl = explode(" ", $tgl);
            $tgl_exp = explode("-", $exp_tgl[0]);
            $waktu_exp = explode(":", $exp_tgl[1]);
            return $tgl_exp[2] . '-' . $tgl_exp[1] . '-' . $tgl_exp[0] . ' ' . $waktu_exp[0] . ':' . $waktu_exp[1] . ':' . $waktu_exp[2];
        } else {
            return 'error';
        }
    }
}

if (!function_exists('timeStampIndoOnly')) {
    function timeStampIndoOnly($tgl)
    {
        if ($tgl != "") {
            $exp_tgl = explode(" ", $tgl);
            $tgl_exp = explode("-", $exp_tgl[0]);
            return $tgl_exp[2] . '-' . $tgl_exp[1] . '-' . $tgl_exp[0];
        } else {
            return 'error';
        }
    }
}

if (!function_exists('jenisSoal')) {
    function jenisSoal($jenis)
    {
        if ($jenis != "") {
            return ($jenis == 1) ? "Ujian" : "Latihan";
        } else {
            return 'Undefined';
        }
    }
}

function format_uang ($angka) {
    return number_format($angka, 0, ',', '.');
}

function terbilang ($angka) {
    $angka = abs($angka);
    $baca  = array('', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas');
    $terbilang = '';

    if ($angka < 12) { // 0 - 11
        $terbilang = ' ' . $baca[$angka];
    } elseif ($angka < 20) { // 12 - 19
        $terbilang = terbilang($angka -10) . ' belas';
    } elseif ($angka < 100) { // 20 - 99
        $terbilang = terbilang($angka / 10) . ' puluh' . terbilang($angka % 10);
    } elseif ($angka < 200) { // 100 - 199
        $terbilang = ' seratus' . terbilang($angka -100);
    } elseif ($angka < 1000) { // 200 - 999
        $terbilang = terbilang($angka / 100) . ' ratus' . terbilang($angka % 100);
    } elseif ($angka < 2000) { // 1.000 - 1.999
        $terbilang = ' seribu' . terbilang($angka -1000);
    } elseif ($angka < 1000000) { // 2.000 - 999.999
        $terbilang = terbilang($angka / 1000) . ' ribu' . terbilang($angka % 1000);
    } elseif ($angka < 1000000000) { // 1000000 - 999.999.990
        $terbilang = terbilang($angka / 1000000) . ' juta' . terbilang($angka % 1000000);
    }

    return $terbilang;
}

function tanggal_indonesia($tgl, $tampil_hari = true)
{
    $nama_hari  = array(
        'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'
    );
    $nama_bulan = array(1 =>
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    );

    $tahun   = substr($tgl, 0, 4);
    $bulan   = $nama_bulan[(int) substr($tgl, 5, 2)];
    $tanggal = substr($tgl, 8, 2);
    $text    = '';

    if ($tampil_hari) {
        $urutan_hari = date('w', mktime(0,0,0, substr($tgl, 5, 2), $tanggal, $tahun));
        $hari        = $nama_hari[$urutan_hari];
        $text       .= "$hari, $tanggal $bulan $tahun";
    } else {
        $text       .= "$tanggal $bulan $tahun";
    }
    
    return $text; 
}

function tambah_nol_didepan($value, $threshold = null)
{
    return sprintf("%0". $threshold . "s", $value);
}