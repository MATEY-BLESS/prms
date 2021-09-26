<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Role;
use Illuminate\Http\Request;

class BackendDashboardController extends Controller
{
    public function index()
    {
        $doctors = Role::withCount('admins')->where('name', 'doctor')->get();

        // dd($doctors) ;
        $patients = Patient::all();
        $appointments = Appointment::with('admin')->get();
        // dd($appointments);
        return view('dashboard.index', [
            'doctors' => $doctors,
            'patients' => $patients,
            'appointments' => $appointments,
        ]);
    }
}
