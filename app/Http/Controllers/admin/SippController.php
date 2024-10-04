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
}