<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;

class SippController extends Controller
{
    public function index()
    {
      
        $members = Member::latest()->when(request()->q, function($members) {
            $members = $members->where('full_name', 'like', '%'. request()->q . '%');
        })->paginate(10);
        return view('admin.sipp.index', compact('members'));
    }
    public function edit(Member $member)
    {
        return view('admin.sipp.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
{
    $request->validate([
        'full_name' => 'required|string|max:255',
        // 'email' => 'required|email|unique:members,email,' . $member->id,
        // 'home_address' => 'required|string',
        // 'business_address' => 'required|string',
        // 'business_contribution' => 'required|string',
        // 'business_type' => 'required|string',
        // 'skills' => 'required|string',
        // 'business_location' => 'required|string',
        // 'business_capital' => 'required|numeric',
        // 'production_capability' => 'required|string',
        // 'business_activity_documentation' => 'nullable|url',
    ]);
    

    $member->update($request->all());

    return redirect()->route('sipp.index')->with('success', 'Member updated successfully.');
}

    
    public function destroy(Member $member) 
    {
         $member->delete(); 
         return redirect()->route('sipp.index')->with('success', 'Member deleted successfully.'); 
    }
}