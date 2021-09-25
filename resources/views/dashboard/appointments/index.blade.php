@extends('layouts.dashboard')
@section('content')
<style>
    .section-container{
        min-height: 600px;
        background-color: whitesmoke;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 15px;
    }

    .list-else-message{
        text-align: center;
        padding: 100px;
        color: #b1aeae;
        font-size: 1rem;
    }

    .grid-view{
        /* width: 200px; */
        min-height: 200px;
        display: none;
    }

    #testing{
        height: 300px;
        display: none;
    }

    .grid-view-image{
        height: 150px;
        background-color: #cecece;
    }

    .grid-view-image img{
        width: 100%;
        height: 100%;
        object-fit: cover;

    }

    .grid-view-name{
        background-color: white;
        height: 80px;
    }

    .grid-view-date{
        height: 30px;
        background-color: white;
    }
    .extra-details{
        border-top: 1px solid #cecece;
        background-color: white;
        height: 40px;
    }

    #table{
        display: none;
    }

    #tableView{
        width: 100%;
    }

    .appointment-admin-label{
        font-size: 12px;
        color: darkblue;
        font-family: 'Passion One', cursive;
        font-weight: lighter;
    }
</style>


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
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($appointments as $appointment)
                        {{-- @foreach ($appointment->patient as $patient) --}}
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

                            <td class="d-flex justify-content-between align-items-center">
                                @if ($appointment->doctor_id != null)
                                    doctor assigned
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
