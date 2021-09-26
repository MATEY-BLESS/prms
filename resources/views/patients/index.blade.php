@extends('layouts.accounts.user-dashboard')
@section('content')

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
</div>
@endsection
