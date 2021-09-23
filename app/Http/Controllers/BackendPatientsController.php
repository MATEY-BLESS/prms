<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class BackendPatientsController extends Controller
{

    public function index()
    {
        $patients = User::all();
        return view('dashboard.patients.index', [
            'patients' => $patients,
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
}
