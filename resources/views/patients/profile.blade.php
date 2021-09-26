@extends('layouts.accounts.user-dashboard')
@section('content')
    <div class="my-3">
        <h1>Your Profile</h1>
    </div>

    <div class="row">
        <div class="col-md-2">
            <div style="height: 150px; background-color: silver; border-radius: 5px;">

            </div>

            <div class="mt-2">
                <p >
                    <a href="#" class="btn btn-outline-success btn-sm" style="width:100%;">Change Profile Image</a>
                </p>
            </div>

        </div>
        <div class="col-md-10">
            <div>
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


@endsection
