<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class BackendAccountUserProfileController extends Controller
{
    public function index(){
        $appointments = Appointment::all();
        return view('accounts.index', [
            'appointments' => $appointments,
        ]);
    }

    public function show()
    {
        return view('accounts.profile');
    }
}
