<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class DoctorDashboardController extends Controller
{
    public function index()
    {
        return view('doctors.index');
    }

    public function patients()
    {
        return view('doctors.patients.index');
    }

    public function appointments()
    {
        return view('doctors.appointments.index');
    }

    public function create_appointment()
    {
        // $patients = Appointment::with('patient')->get();
        // dd($patients);
        return view('doctors.appointments.create');
    }

    public function store_appointment()
    {
        return "it will work";
    }
}
