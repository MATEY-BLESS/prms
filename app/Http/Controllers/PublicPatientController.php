<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;

class PublicPatientController extends Controller
{
    public function index()
    {
        return view('patients.index');
    }
    public function appointment_index()
    {
        $appointments = Appointment::with('patient')->with('admin')->get();
        // dd($appointments);
        return view('patients.appointments.index', [
            'appointments' => $appointments,
        ]);
    }

    public function appointment_create()
    {
        return view('patients.appointments.create');
    }

    public function appointment_store(Patient $patient, Request $request){

        $input = $request->validate([
            'purpose' => 'nullable|string',
            'date' => 'required',
            'issue' => 'nullable|string'
        ]);

        $appointment = new Appointment;
        $appointment->purpose = $input['purpose'];
        $appointment->date = $input['date'];
        $appointment->issue = $input['issue'];

        $patient = auth()->user()->patient;
        $patient->appointments()->save($appointment);

        return redirect()->route('public.patient.appointment.index');
    }
}
