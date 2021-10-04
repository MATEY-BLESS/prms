<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;

class BackendAppointmentsController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('doctor')->get();
        // dd($appointments);
        return view('dashboard.appointments.index', [
            'appointments' => $appointments,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $doctors = Doctor::with('admin')->get();
        return view('dashboard.appointments.edit', [
            'appointment' => $appointment,
            'doctors' => $doctors,
        ]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function assign(Request $request, $id){
        $appointment = Appointment::findOrFail($id);

        $appointment->doctor_id = $request->doctor;
        $appointment->save();

        return redirect()->route('dashboard.appointments.index');

    }
}
