<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Support\Str;
use App\Models\Prescription;
use Illuminate\Http\Request;

class BackendPrescriptionController extends Controller
{
    public function index()
    {
        $prescriptions = Prescription::with('admin')->with('patient')->get();
        // dd($prescriptions);
        return view('dashboard.prescriptions.index', [
            'prescriptions' => $prescriptions,
        ]);
    }

    public function create($id)
    {
        $appointment = Appointment::with('patient')->with('admin')->findOrFail($id);

        // dd($appointment);
        return view('doctors.prescriptions.create', [
            'appointment' => $appointment,
        ]);
    }

    public function store(Prescription $prescription, Request $request)
    {
        $this->addUpdate($prescription, $request);
        return redirect()->route('dashboard.doctors.prescription.index');
    }

    private function addUpdate(Prescription $prescription, Request $request)
    {
        $input = $request->validate([
            'disease' => 'required|string',
            'details' => 'required|string',
            'medicine' => 'required|string',
            'note' => 'nullable|string',
            'patient_id' => 'integer',
            'doctor_id' => 'integer',

        ]);

        $prescription->disease = $input['disease'];
        $prescription->slug = Str::of($input['disease'])->slug('-');
        $prescription->details = $input['details'];
        $prescription->medicine = $input['medicine'];
        $prescription->note = $input['note'];
        $prescription->patient_id = $input['patient_id'];
        $prescription->doctor_id = $input['doctor_id'];

        $prescription->save();

    }
}
