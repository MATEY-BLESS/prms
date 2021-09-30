@extends('layouts.accounts.user-dashboard')
@section('content')
<style>
    .other-details p span{
        font-weight: bold;
    }
</style>
{{-- SECTION2: Something cool here --}}
<div class="col-md-12">
    <div class="appointment-wrapper">
        <div class="row">
            <div class="col-md-4">
                {{-- profile image --}}
                <div class="patient-profile-image-wrapper">
                    <div class="patient-profile-image">

                    </div>

                    <div class="mt-2">
                        <p >
                            <a href="#" class="btn btn-outline-success btn-sm" style="width:100%;">Change Profile Image</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="p-4">
                    <p>
                        <span style="font-weight: bold;">Full Name:</span>
                        {{Auth::user()->name}}
                    </p>

                    <p>
                        <span style="font-weight: bold;">Email:</span>
                        {{Auth::user()->email}}
                    </p>

                    <p>
                        <span style="font-weight: bold;">Added since:</span>
                        {{Auth::user()->created_at->diffForHumans()}}
                    </p>

                    <p>
                        <a href="#" class="btn btn-secondary btn-sm">Change Password</a>
                        <a href="#" class="btn btn-primary btn-sm">EDIT PROFILE</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- other details --}}
    <div class="appointment-wrapper my-3 p-4">
        <div class="other-details text-center">
            <h1>Other Details</h1>
            <p> <span>DOB:</span>  {{Auth::user()->patient->dob}}</p>
            <p> <span>REGION:</span>  {{Auth::user()->patient->region}}</p>
            <p> <span>LOCALITY:</span>  {{Auth::user()->patient->locality}}</p>
            <p> <span>NEXT OF KIN:</span>  {{Auth::user()->patient->next_of_kin}}</p>
            <p> <span>MOBILE:</span>  {{Auth::user()->patient->mobile}}</p>
            <p> <span>EMERGENCY CONTACT:</span>  {{Auth::user()->patient->emergency_contact}}</p>
        </div>
    </div>
</div>
@endsection
