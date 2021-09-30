@extends('layouts.doctor')

@section('content')
<style>
    .doctor-img-box{
        width: 100%;
        height: 230px;
        background-color: silver;
        border-radius: 5px;
        padding: 1rem;
    }
    .doctor-img-box img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .doctor-details-box{
        background-color: whitesmoke;
        min-height: 230px;
        padding: 20px;
        border-radius: 5px;
    }

    .doctor-details-box h1{
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
        font-weight: bold;
    }

    .other-details p span{
        font-weight: bold;
    }


</style>
<div class="section-container">
    <h3 id="headingColor">Your Profile</h3>

    <div class="row">
        {{-- doctor image --}}
        <div class="col-md-3 col-xxl-3">
            <div class="doctor-img-box" style="">
                <img src="{{asset($doctor->image)}}" alt="">
            </div>
        </div>

        {{-- doctor details --}}
        <div class="col-md-9 col-xxl-9">
            <div class="doctor-details-box">

                <h1>
                    <b>{{$doctor->name}}</b>
                </h1>

                <p>
                    <span style="font-weight: bold;">Age:</span>
                    {{$doctor->age}}
                </p>

                <p>
                    <span style="font-weight: bold;">Email:</span>
                    {{$doctor->email}}
                </p>

                <p>
                    <span style="font-weight: bold;">Profile Since:</span>
                    {{$doctor->created_at->diffForHumans()}}
                </p>

                <div class="mt-4">
                    <a href="#" class="btn btn-outline-success btn-sm">EDIT PROFILE</a>
                </div>
            </div>
        </div>



        {{-- related or recent activities --}}
        <div class="col-md-12 col-xxl-12">
            <div class="recent-activity border">
                <div class="other-details text-center">
                    <h1 id="headingColor">Other Deatils</h1>

                    <p> <span>DOB:</span>  {{$doctor->dob}}</p>
                    <p> <span>REGION:</span>  {{$doctor->region}}</p>
                    <p> <span>LOCALITY:</span>  {{$doctor->locality}}</p>
                    <p> <span>NEXT OF KIN:</span>  {{$doctor->next_of_kin}}</p>
                    <p> <span>MOBILE:</span>  {{$doctor->mobile}}</p>
                    <p> <span>EMERGENCY CONTACT:</span>  {{$doctor->emergency_contact}}</p>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
