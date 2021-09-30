<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicPrescriptionController extends Controller
{
    public function index()
    {
        return view('patients.prescriptions.index');
    }
}
