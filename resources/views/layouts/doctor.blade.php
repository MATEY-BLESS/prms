<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Starter') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Passion+One&display=swap" rel="stylesheet">

        <!-- Styles -->
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/doctors.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="">
        <style>
            body{
                background-color: rgb(231, 228, 228); /*#f3f4f8*/
            }

            /* MEDIA QUERIES */
            @media (min-width: 1400px) {
                #contentContainer{
                    padding: 0 150px;
                }
            }
        </style>



        {{-- dashboard top navbar --}}
        <div class="container-fluid">
            <div class="row sticky-top shadow-sm" style="height: ; background-color: #F6F8FA;">
                {{-- top navs --}}
                @include('includes.dashboard.header')
            </div>


            <div class="row">

                {{-- left sidebar --}}
                <div class="col-lg-2"> </div>

                <div class="col-lg-8 py-5">
                    {{-- main content --}}
                    <div class="row">
                        {{-- quick navs --}}
                        <div class="quick-nav-wrapper d-flex justify-content-between align-items-center flex-wrap">
                            <div class="doctor-name">
                                <h1>Hello Dr. {{auth()->user()->name}}</h1>
                            </div>


                            <div>
                                <a href="{{route('dashboard.doctor')}}" class="btn btn-secondary btn-sm my-1">Dashboard</a>
                                <a href="{{route('dashboard.doctors.patients.index')}}" class="btn btn-info btn-sm my-1">Patients</a>
                                <a href="{{route('dashboard.doctors.appointments.index')}}" class="btn btn-info btn-sm my-1">Appointments</a>
                                <a href="{{route('dashboard.doctors.prescription.index')}}" class="btn btn-info btn-sm my-1">Prescriptions</a>
                                <a href="{{route('dashboard.doctor.show', auth()->user()->doctor->id)}}" class="btn btn-success btn-sm my-1">Your Profile</a>
                            </div>
                        </div>

                        {{-- content --}}
                        @yield('content')
                    </div>
                </div>

                <div class="col-lg-2"> </div>
            </div>
        </div>

        @yield('script')

        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
    </body>
</html>
