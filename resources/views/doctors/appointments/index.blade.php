@extends('layouts.doctor')
@section('content')

{{-- Doctor's Patients --}}
<div class="col-md-12">
    <div class="top-articles">
        <h5 class="stat-heading">Pending Appointments</h5>

        <a href="{{route('dashboard.doctors.appointments.create')}}" class="btn btn-success btn-sm my-2">Give Appointment</a>
        <div class="table-responsive">
            <table class="table table-hover" >
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Purpose</th>
                        <th scope="col">Profile Image</th>
                        <th scope="col">Appointment Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse (auth()->user()->doctor->appointments as $appointment)
                    <tr>
                        <td scope="row" id="patient">{{$appointment->id}}</td>
                        <td>{{$appointment->patient->user->name}}</td>
                        <td>{{$appointment->purpose}}</td>
                        <td>
                            <img src="#"
                                    width="50" height="50" style="border-radius: 50px;">
                        </td>
                        <td>{{$appointment->created_at->isoFormat('LL')}}</td>

                        <td>Time</td>
                        <td>{{$appointment->status}}</td>

                        <td class="d-flex justify-content-between">
                            <span><a href="{{route('dashboard.doctors.patients.profile', $appointment->patient->user->id)}}"
                                class="btn btn-success btn-sm">VIEW PROFILE</a></span>

                            <span class="mx-1">
                                <a href="{{route('dashboard.doctors.prescription.create', $appointment->id)}}" class="btn btn-warning btn-sm">Give Prescription</a>
                            </span>

                            <span class="mx-1"><a href="#"
                                class="btn btn-warning btn-sm">Send Message</a></span>

                            <span class="mx-1"><a href="#"
                                    class="btn btn-danger btn-sm">RE-BOOK</a></span>
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
{{-- End section 2 --}}

@endsection

