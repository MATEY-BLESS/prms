@extends('layouts.accounts.user-dashboard')
@section('content')

<div class="col-md-12">
    <div class="appointment-wrapper p-3">
        <div class="table-responsive">
            <table class="table table-hover" >
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Disease</th>
                        <th scope="col">Symptoms</th>
                        <th scope="col">Medication</th>
                        <th scope="col">Note</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse (auth()->user()->patient->prescriptions as $prescription)
                    <tr>
                        <td scope="row" id="patient">{{$prescription->id}}</td>
                        <td>Dr. {{$prescription->doctor->admin->name}}</td>
                        <td>{{$prescription->disease}}</td>
                        <td>{{$prescription->details}}</td>
                        <td>{{$prescription->medicine}}</td>
                        <td>{{$prescription->note}}</td>
                        <td>{{$prescription->created_at->isoFormat('LL')}}</td>

                        <td class="d-flex justify-content-between">
                            <span class="mx-1">
                                <a href="{{route('dashboard.patient.prescription.show', $prescription->id)}}"
                                    class="btn btn-warning btn-sm">VIEW</a>
                            </span>

                            <span class="mx-1">
                                <a href="#" class="btn btn-warning btn-sm">Download</a>
                            </span>
                        </td>


                    </tr>
                    @empty
                        <td>No patients</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
