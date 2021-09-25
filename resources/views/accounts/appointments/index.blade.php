@extends('layouts.accounts.user-dashboard')
@section('content')
<style>
    .dashboard-hero{
        /* background-color: lawngreen; */
        background: linear-gradient(103deg, rgb(3, 239, 98) 0%, rgb(3, 239, 98) 65%, rgb(5, 25, 45) 65%, rgb(5, 25, 45) 100%);
        width: 100%;
        min-height: 2rem;
        border-radius: 10px;
        padding: 0.6rem 1rem;
    }

    .dashboard-hero h2{
        font-size: 1.5rem;
    }

    .dashboard-hero-subheading{
        color: #05192d;
        font-family: 'Passion One', cursive;
        font-weight: lighter;
        font-size: 24px;
    }

    .dashboard-hero-text{
        width: 70%;
    }

    .stats-element-box,
    .appointment-wrapper,
    .stats-element-box-2{
        width: 100%;
        background-color: whitesmoke;
        border-radius: 10px;
        border:1px solid #dee1e4;
    }

    .stats-element-box{
        height: 5.625rem;
    }

    .appointment-wrapper{
        min-height: 3.625rem;
        padding: 1rem;
    }
    .appointment-wrapper h1{
        font-size: 1.2rem;
    }
    .stats-element-box-2{
        height: 30rem;
    }

    .stats-element-box:hover,
    .appointment-wrapper:hover,
    .stats-element-box-2:hover{
        border:1px solid lime;
    }

    label{
        font-weight: bold;
    }
</style>
    {{-- dashboard hero --}}



    {{-- SECTION2: Something cool here --}}

    <div class="col-md-12">
        <div class="appointment-wrapper">
            <div class="section-subheading d-flex align-items-center justify-content-between">
                <div>
                    <h1>Upcoming Appointment(s)</h1>
                    <p>You have the following appointments to addend:</p>
                </div>

                <div>
                    <a href="{{route('public.patient.appointment.create')}}" class="btn btn-success btn-sm">Make Appointment</a>
                </div>

            </div>



            <div class="pending-appointment">
                @forelse (auth()->user()->patient->appointments as $appointment)
                <ol>
                    <li>
                        <b>{{$appointment->purpose}}</b>
                        <div>
                        On: {{$appointment->date}}
                        <p>
                            <b>With:</b>
                            <span class="bg-warning px-2 rounded" style="width: fit-content">
                                Dr. {{$appointment->admin->name}}
                            </span>
                        </p>
                        </div>
                    </li>
                </ol>
                @empty

                    <li>No upcoming appointments</li>

                @endforelse
            </div>
        </div>
    </div>



    {{-- SECTION 3: Empty spacce --}}
    {{-- <div class="col-md-6">
        <div class="stats-element-box-2 my-4 shadow-sm">

        </div>
    </div>

    <div class="col-md-6">
        <div class="stats-element-box-2 my-4 shadow-sm">

        </div>
    </div> --}}
@endsection
