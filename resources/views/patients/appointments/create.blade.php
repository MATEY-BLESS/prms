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


    {{-- SECTION2: Something cool here --}}

    <div class="col-md-12">
        <div class="appointment-wrapper">
            <div class="section-subheading d-flex align-items-center justify-content-between">
                <div>
                    <h1>Make Appointment</h1>
                </div>

                <div>
                    <a href="#" class="btn btn-success btn-sm">Cancel</a>
                </div>

            </div>

            <div class="pending-appointment pb-4">
                <div class="my-3">
                    <p class="lead">You will be assigned a doctor and receive email or sms notifications.</p>
                </div>
                <form action="{{route('public.patient.appointment.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-5">
                        {{-- purpose --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Purpose</label>
                                <input  class="form-control @error('purpose') is-invalid @enderror"
                                        type="text" id="formFile"
                                        name="purpose">

                                @error('purpose')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        {{-- select date --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date" class="form-label">Select Date</label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror"
                                        id="date" placeholder="Enter date"
                                        name="date" value="{{old('date')}}"
                                        required>
                                <div class="valid-feedback">
                                  Looks good!
                                </div>

                                @error('title')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- picture of issue: optional --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Upload Picture of Symptom (optional)</label>
                                <input  class="form-control @error('image') is-invalid @enderror"
                                        type="file" id="formFile"
                                        name="image">

                                @error('image')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- describe issue or symptoms --}}
                        <div class="form-group my-3">
                            <label for="issue" class="form-label">Describe your issue or symptoms</label>
                            <textarea class="form-control" id="ck-editor"
                                        rows="10" name="issue"
                                        value="{{old('issue')}}"></textarea>

                            @error('issue')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-sm"
                                style="width: 100%;">SUBMIT</button>
                        </div>
                    </div>
                </form>
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
