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

<div class="section-container">

    <div class="row px-lg-5">
        <h5>Assign Doctor to <b>{{$appointment->patient->user->name}}'s Appointment</b></h5>
        <div class="col-md-12">
            {{-- assign --}}
            <form action="{{route('dashboard.appointments.doctor.assign', $appointment->id)}}" method="POST">
                @csrf
                <div class="form-group my-3 d-flex flex-wrap align-items-center justify-content-between">
                    <input type="hidden" name="patient" value="{{$appointment->id}}">

                    <select class="form-select @error('admin') is-invalid @enderror"
                            id="admin" name="doctor"
                            value="{{old('admin')}}"
                            style="width: 90%;"
                            required>

                        <option>Select Doctor</option>
                        @forelse ($doctors as $doctor)
                            <option value="{{$doctor->id}}">{{$doctor->admin->name}}</option>
                        @empty
                        <option >No doctors</option>
                        @endforelse

                    </select>

                    <button type="submit" class="btn btn-primary btn-sm">ASSIGN</button>

                </div>



            </form>
        </div>

        {{-- existing --}}
        <div class="my-4">
            <h5>
                <b>Assinged Doctors</b>
            </h5>

            @if ($appointment->doctor)

            <table class="table table-responsive table-hover" >
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Reason or Disease</th>
                        <th scope="col">Appointment Status</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td scope="row" id="patient">{{$appointment->id}}</td>
                        <td scope="row" id="patient">{{$appointment->doctor->admin->name}}</td>
                        <td>{{$appointment->purpose}}</td>
                        <td>{{$appointment->status}}</td>
                    </tr>
                </tbody>
            </table>

            @endif


        </div>
        <div class="col-md-1"></div>
        <div class="col-md-5">


        </div>

    </div>
</div>

@endsection
