<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class BackendAdminProfileController extends Controller
{
    public function index()
    {
        return view('admins.profile.index');
    }

    public function show($id){
        $profile = Admin::findOrFail($id);
        return view('admins.profile.show', compact('profile'));
    }
}
