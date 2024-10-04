<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;

class BusinessRegistrationController extends Controller
{
    public function processForm(Request $request)
    {
        // Ambil waktu saat ini dan waktu pengiriman terakhir dari session
        $now = now();
        $lastSubmissionTime = session('last_submission_time');

        // Tentukan jeda waktu (misal, 60 detik)
        $delayInSeconds = 60;

        // Jika waktu pengiriman terakhir ada dan selisih waktu pengiriman terakhir dengan sekarang kurang dari 60 detik, tampilkan pesan error
        if ($lastSubmissionTime && $now->diffInSeconds($lastSubmissionTime) < $delayInSeconds) {
            return redirect()->back()->withErrors(['message' => 'Tunggu 60 detik sebelum mengirim lagi.']);
        }

        // Validasi input form
        $request->validate([
            'full_name' => 'required|max:50',
            'home_address' => 'required|max:191',
            'business_address' => 'required|max:191',
            'business_contribution' => 'nullable|max:191',
            'business_type' => 'required|max:191',
            'skills' => 'required|max:191',
            'business_location' => 'required|max:191',
            'business_capital' => 'required|numeric',
            'production_capability' => 'required|max:191',
            'business_activity_documentation' => 'nullable|string',
            'email' => 'required|email|unique:members,email',
            'captcha' => 'required|in:' . session()->get('captcha_answer'),
        ]);

        // Buat instance Member baru dan simpan data dari input
        $member = new Member();
        $member->full_name = $request->input('full_name');
        $member->home_address = $request->input('home_address');
        $member->business_address = $request->input('business_address');
        $member->business_contribution = $request->input('business_contribution');
        $member->business_type = $request->input('business_type');
        $member->skills = $request->input('skills');
        $member->business_location = $request->input('business_location');
        $member->business_capital = $request->input('business_capital');
        $member->production_capability = $request->input('production_capability');
        $member->business_activity_documentation = $request->input('business_activity_documentation');
        $member->email = $request->input('email');

        // Simpan data member ke dalam database
        $member->save();

        // Simpan waktu pengiriman saat ini di session
        session(['last_submission_time' => $now]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with(['success' => 'Registrasi berhasil! Anda akan segera dihubungi oleh admin melalui email.']);
    }
    

}
