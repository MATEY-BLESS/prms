<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Appointment;
use Illuminate\Http\Request;

class BackendAppointmentsController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('admin')->get();
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
        $roles = Role::with('admins')->where('name', 'doctor')->get();
        return view('dashboard.appointments.edit', [
            'appointment' => $appointment,
            'roles' => $roles,
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

        $appointment->admin_id = $request->admin;
        $appointment->save();

        return redirect()->route('dashboard.appointments.index');

    }
}
