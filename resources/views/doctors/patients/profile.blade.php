@extends('layouts.doctor')
@section('content')
<style>
    .patient-img-box{
        width: 100%;
        height: 230px;
        background-color: silver;
        border-radius: 5px;
        padding: 1rem;
    }
    .patient-img-box img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .patient-details-box{
        background-color: whitesmoke;
        min-height: 230px;
        padding: 20px;
        border-radius: 5px;
    }

    .patient-details-box h1{
        text-transform: uppercase;
    }

    .recent-activity{
        background-color: whitesmoke;
        min-height: 350px;
        margin-top: 1.875rem;
        border-radius: 5px;
        padding: 20px;
    }

    #headingColor{
        color: rgb(50, 50, 136);
    }


</style>

{{-- Doctor's Patients --}}
<div class="row">
    <h3 id="headingColor">{{$patient->user->name}}'s  Profile</h3>

    {{-- patient image --}}
    <div class="col-md-3 col-xxl-3">
        <div class="patient-img-box" style="">
            <img src="{{asset($patient->image)}}" alt="">
        </div>
    </div>

    {{-- patient details --}}
    <div class="col-md-9 col-xxl-9">
        <div class="patient-details-box">

            <h1>
                <b>{{$patient->user->name}}</b>
            </h1>

            <p>
                <span style="font-weight: bold;">Age:</span>
                {{$patient->age}}
            </p>

            <p>
                <span style="font-weight: bold;">Email:</span>
                {{$patient->user->email}}
            </p>

            <p>
                <span style="font-weight: bold;">Profile Since:</span>
                {{$patient->created_at->diffForHumans()}}
            </p>

            <div class="mt-4">
                <a href="#" class="btn btn-outline-success btn-sm">EDIT RECORDS</a>
            </div>
        </div>
    </div>

    {{-- related or recent activities --}}
    <div class="col-md-12 col-xxl-12">
        <div class="recent-activity border">
            <div class="row">
                <div class="col-lg-6">
                    <h4 id="headingColor">Other Deatils</h4>

                    <div class="other-details">
                        <p>DOB: {{$patient->dob}}</p>
                        <p>REGION: {{$patient->region}}</p>
                        <p>LOCALITY: {{$patient->locality}}</p>
                        <p>NEXT OF KIN: {{$patient->next_of_kin}}</p>
                        <p>MOBILE: {{$patient->mobile}}</p>
                        <p>EMERGENCY CONTACT: {{$patient->emergency_contact}}</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <h4 id="headingColor">Current Doctors</h4>
                    <ol>
                        @forelse ($patient->doctors as $doctor)
                        <li>Dr. {{$doctor->admin->name}}</li>
                        @empty
                        <li>You have no doctor(s) currently assigned.</li>
                        @endforelse
                    </ol>
                </div>
            </div>

        </div>
    </div>

    {{-- related or recent activities --}}
    <div class="col-md-12 col-xxl-12">
        <div class="recent-activity">
            <h4 id="headingColor">Related Activities</h4>
            <small class="text-muted">Such as appointments booked & attended.</small>
        </div>
    </div>
</div>
{{-- End section 2 --}}

@endsection

