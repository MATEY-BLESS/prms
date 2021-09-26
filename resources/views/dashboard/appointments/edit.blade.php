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
        <div class="col-md-6">
            <form action="{{route('dashboard.appointments.doctor.assign', $appointment->id)}}" method="POST">
                @csrf
                <div class="form-group my-3">
                    <select class="form-select @error('admin') is-invalid @enderror"
                            id="admin" name="admin"
                            value="{{old('admin')}}"
                            style="width:100%;"
                            required>

                        <option>Select Doctor</option>
                        @forelse ($roles as $role)
                        @foreach ($role->admins as $doctor)
                            <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                        @endforeach

                        @empty
                        <option >No doctors</option>
                        @endforelse

                    </select>
                </div>

                <input type="hidden" name="patient" value="{{$appointment->id}}">

                <button type="submit" class="btn btn-primary btn-sm">ASSIGN</button>
            </form>
        </div>

        <div class="col-md-1"></div>
        <div class="col-md-5">
            <div class="my-4">
                <h4>
                    <b>Patient's Assinged Doctors</b>
                </h4>

                <ol>

                    <li></li>

                </ol>
            </div>

        </div>

    </div>
</div>

@endsection
