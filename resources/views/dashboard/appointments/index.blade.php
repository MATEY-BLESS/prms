@extends('layouts.dashboard')
@section('content')

<div class="d-flex justify-content-between">
    <h4>Active Appointments</h4>
    <h4>
        <a href="#" class="btn btn-success btn-sm">Add Appointment</a>
    </h4>
</div>

<div class="section-container">
    @if ($appointments->count() > 0)

        <div id="tableView">
            <table class="table table-responsive table-hover" >
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Purpose</th>
                        <th scope="col">Profile Image</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Added By</th>
                        <th scope="col">Status</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($appointments as $appointment)
                        {{-- @foreach ($appointment->admin as $doctor) --}}
                        <tr>
                            <td scope="row" id="appointment">{{$appointment->id}}</td>
                            <td>{{$appointment->patient->user->name}}</td>
                            <td>{{$appointment->purpose}}</td>
                            <td>
                                <img src="{{asset($appointment->image)}}"
                                        width="50" height="50" style="border-radius: 50px;">
                            </td>
                            <td>{{$appointment->created_at->isoFormat('LL')}}</td>

                            <td>Who added appointment</td>
                            <td>{{$appointment->status}}</td>
                            <td>
                                <b>{{$appointment->doctor ? $appointment->doctor->admin->name   : 'N/a'}}</b>
                            </td>

                            <td class="d-flex justify-content-between align-items-center">
                                @if ($appointment->doctor_id != null)
                                <a href="{{route('dashboard.appointments.edit', $appointment->id)}}" class="btn btn-success btn-sm me-1">RE-ASSIGN</a></span>
                                @else
                                <span class="me-1">
                                    <a href="{{route('dashboard.appointments.edit', $appointment->id)}}" class="btn btn-info btn-sm">Assign Doctor</a>
                                </span>
                                @endif

                                <span><a href="#" class="btn btn-success btn-sm">VIEW</a></span>
                            </td>
                        </tr>
                        {{-- @endforeach --}}

                    @empty
                        <td>No appointments</td>
                    @endforelse
                </tbody>
            </table>
        </div >

    @else

        <div class="list-else-message">
            <span >No appointments.</span>
            <div class="my-4">
                <span class="fs-2">All <b>appointments</b> will show here in table with grid view option.</span>
            </div>
        </div>

    @endif
</div>

@endsection
