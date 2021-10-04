@extends('layouts.dashboard')
@section('content')

<style>
    .profile-img-box{
        height: 230px;
        background-color: silver;
        border-radius: 5px;
    }

    .profile-details-box{
        background-color: whitesmoke;
        min-height: 230px;
        padding: 20px;
        border-radius: 5px;
    }

    .profile-details-box h1{
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


    <h3 id="headingColor">Your Profile</h3>

    {{-- Profile image --}}
    <div class="col-md-3 col-xxl-3">
        <div class="profile-img-box" style="">

        </div>
    </div>

    {{-- Profile details --}}
    <div class="col-md-9 col-xxl-9">
        <div class="profile-details-box">
            <h1>
                <b>{{auth('admin')->user()->name}}</b>
            </h1>

            <p>
                <span style="font-weight: bold;">Role:</span>
                {{auth('admin')->user()->role->name}}
            </p>

            <p>
                <span style="font-weight: bold;">Email:</span>
                {{auth('admin')->user()->email}}
            </p>

            <p>
                <span style="font-weight: bold;">Added since:</span>
                {{auth('admin')->user()->created_at->diffForHumans()}}
            </p>

            <div class="mt-4">
                <a href="#" class="btn btn-outline-success btn-sm">Change Profile Image</a>
                <a href="#" class="btn btn-secondary btn-sm">Change Password</a>
                <a href="#" class="btn btn-primary btn-sm">Request Edit</a>
            </div>
        </div>
    </div>



    {{-- related or recent activities --}}
    <div class="col-md-12 col-xxl-12">
        <div class="recent-activity">
            <h4 id="headingColor">Recent Activities</h4>
        </div>
    </div>




@endsection
