@extends('layouts.doctor')
@section('content')

{{-- Doctor's Patients --}}
<div class="col-md-12">
    <div class="top-articles">
        <h5 class="stat-heading">Prescriptions</h5>

        <div class="table-responsive">
            <table class="table table-hover" >
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Disease</th>
                        <th scope="col">Symptom Detail</th>
                        <th scope="col">Medication</th>
                        <th scope="col">Note</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse (auth()->user()->doctor->prescriptions as $prescription)
                    <tr>
                        <td scope="row" id="patient">{{$prescription->id}}</td>
                        <td>{{$prescription->patient->user->name}}</td>
                        <td>{{$prescription->disease}}</td>
                        <td>{{$prescription->details}}</td>
                        <td>{{$prescription->medicine}}</td>
                        <td>{{$prescription->note}}</td>
                        <td>{{$prescription->created_at->isoFormat('LL')}}</td>

                        <td class="d-flex justify-content-between">
                            <span class="mx-1">
                                <a href="#" class="btn btn-warning btn-sm">VIEW</a>
                            </span>

                            <span class="mx-1">
                                <a href="#" class="btn btn-warning btn-sm">EDIT</a>
                            </span>

                            <span class="mx-1"><a href="#"
                                class="btn btn-warning btn-sm">Send Message</a></span>

                            <span><a href="{{route('dashboard.doctors.patients.profile', $prescription->patient->user->id)}}"
                                class="btn btn-success btn-sm">VIEW PROFILE</a></span>
                        </td>


                    </tr>
                    @empty
                        <td>You have not written any prescriptions yet.</td>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
{{-- End section 2 --}}

@endsection

