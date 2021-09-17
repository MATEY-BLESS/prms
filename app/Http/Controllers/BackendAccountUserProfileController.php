<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendAccountUserProfileController extends Controller
{
    public function show()
    {
        return view('accounts.profile');
    }
}
