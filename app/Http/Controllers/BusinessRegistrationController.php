<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;

class BusinessRegistrationController extends Controller
{
    public function processForm(Request $request)
{
    $request->validate([
        'full_name' => 'required|max:255',
        'home_address' => 'required|max:255',
        'business_address' => 'required|max:255',
        'business_contribution' => 'nullable|max:255',
        'business_type' => 'required|max:255',
        'skills' => 'required|max:255',
        'business_location' => 'required|max:255',
        'business_capital' => 'required|numeric',
        'production_capability' => 'required|max:255',
        'business_activity_documentation' => 'nullable|string',
        'email' => 'required|email|unique:users,email', // Assumes you have a users table with email column
        'captcha' => 'required|in:' . session()->pull('captcha_answer'), // Pull and forget the session value
    ]);

    // Create a new Member instance and assign each field explicitly
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
    
    $member->save();

    return redirect()->route('home')->with('success', 'Registration successful!');
}

}
