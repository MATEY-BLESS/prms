<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;

class PublicPrescriptionController extends Controller
{
    public function index()
    {
        return view('patients.prescriptions.index');
    }

    public function show($id)
    {
        $prescription = Prescription::findOrFail($id);
        return view('patients.prescriptions.show', [
            'prescription' => $prescription,
        ]);
    }
}
