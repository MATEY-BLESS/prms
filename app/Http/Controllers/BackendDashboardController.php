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

        $doctors = Doctor::orderBy('created_at', 'desc')->get();

        // revist this
        $activeDoctors = Role::where('name', 'doctor')->get();

        $patients = Patient::all();
        $appointments = Appointment::with('admin')->get();

        return view('dashboard.index', [
            'doctors' => $doctors,
            'patients' => $patients,
            'appointments' => $appointments,
            'activeDoctors' => $activeDoctors,
        ]);
    }
}
