<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class BackendPatientsController extends Controller
{

    public function index()
    {
        $patients = Patient::with('user')->get();
        $roles = Role::with('admin')->where('name', 'doctor')->get();
        return view('dashboard.patients.index', [
            'patients' => $patients,
            'roles' => $roles,
        ]);
    }

    public function create()
    {
        return view('dashboard.patients.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Patient $patient)
    {
        return view('dashboard.patients.show', [
            'patient' => $patient,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function assign_doctor($id){
        $patient = Patient::findOrFail($id);

        // return $patient->name;
        $doctors = Doctor::all();

        return view('dashboard.patients.assign_doctor', [
            'patient' => $patient,
            'doctors' => $doctors,
        ]);

    }

    public function assign(Request $request){

        $id = $request->patient;
        $patient = Patient::find($id);

        // return $patient;

        $patient->doctors()->attach(request('doctor'));
        return redirect()->route('dashboard.patients.index');
    }
}
