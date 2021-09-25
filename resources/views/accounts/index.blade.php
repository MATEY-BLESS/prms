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

    /* appointments */
    .appointment-wrapper{
        min-height: 3.625rem;
        padding: 1rem 0;
    }
    .appointment-wrapper h1{
        font-size: 1.2rem;
    }
    .patient-profile-image-wrapper{
        padding: 1rem;
    }
    .patient-profile-image{
        width: 100%;
        height: 200px;
        background-color: silver;
        border-radius: 50%;
    }


    .stats-element-box-2{
        height: 30rem;
    }

    .stats-element-box:hover,
    .appointment-wrapper:hover,
    .stats-element-box-2:hover{
        border:1px solid lime;
    }

    /* MEDIA QUERIES */
    @media (max-width: 920px) {
        .patient-profile-image-wrapper{
            padding: 0 5rem;
        }
        .patient-profile-image{
            width: 100%;
            height: 200px;
            background-color: silver;
            border-radius: 50%;
        }
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
