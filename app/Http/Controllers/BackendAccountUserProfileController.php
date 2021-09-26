<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class BackendAccountUserProfileController extends Controller
{
    public function index(){
        $appointments = Appointment::all();
        return view('patients.index', [
            'appointments' => $appointments,
        ]);
    }

    public function show()
    {
        return view('patients.profile');
    }
}
