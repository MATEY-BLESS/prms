@extends('layouts.accounts.user-dashboard')
@section('content')

<div class="col-md-12">
    <div class="appointment-wrapper p-3">
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

                    @if ($appointment->doctor)
                    <p>
                        <b>With:</b>
                        <span class="bg-warning px-2 rounded" style="width: fit-content">
                            Dr. {{$appointment->doctor->admin->name}}
                        </span>
                    </p>
                    @else
                    <div>
                        <small style="color: red;">You will be assigned a doctor soon. Check later.</small>
                    </div>
                    @endif

                    </div>
                </li>
            </ol>
            @empty
                <li>No upcoming appointments</li>
            @endforelse
        </div>
    </div>
</div>

@endsection
