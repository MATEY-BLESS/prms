<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorDashboardController extends Controller
{
    public function index()
    {
        return view('doctors.index');
    }

    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctors.show', [
            'doctor' => $doctor,
        ]);
    }

    public function edit($id)
    {
        $doctor = Doctor::with('admin')->findOrFail($id);
        return view('doctors.edit', [
            'doctor' => $doctor,
        ]);
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
        return view('doctors.appointments.create');
    }

    public function prescriptions()
    {
        return view('doctors.prescriptions.index');
    }

    public function store_appointment()
    {
        return "it will work";
    }

    public function profile($id)
    {
        $patient = Patient::findOrFail($id);
        return view('doctors.patients.profile', [
            'patient' => $patient,
        ]);
    }
}
