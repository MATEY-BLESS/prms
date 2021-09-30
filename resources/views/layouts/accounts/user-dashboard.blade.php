<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Passion+One&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/patients.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <style>
            /* MEDIA QUERIES */
            @media (min-width: 1400px) {
                #contentContainer{
                    padding: 0 150px;
                }
            }
        </style>

        <!-- Page Heading -->
        <div class="container-fluid">
            <header class="bg-white shadow-sm sticky-top">
                @include('layouts.accounts.navigation')
            </header>

            <div class="row">
                <div class="col-md-2"></div>

                {{-- main content --}}
                <div class="col-md-8 py-3">
                    {{-- main content --}}
                    <div class="" id="contentContainer">
                        <div class="row">
                            {{-- dashboard hero --}}
                            <div class="col-md-12">
                                <div class="dashboard-hero">
                                    <h2>Hello {{auth()->user()->name}}</h2>
                                </div>

                                {{-- quick nav links --}}

                                <div class="quick-nav-links my-4">
                                    <a href="{{route('public.patient.appointment.index')}}" class="btn btn-info btn-sm mb-1">Appointments</a>
                                    <a href="{{route('dashboard.patient.prescription.index')}}" class="btn btn-info btn-sm mb-1">Prescriptions</a>
                                    <a href="#" class="btn btn-info btn-sm mb-1">Messages</a>
                                    <a href="#" class="btn btn-info btn-sm mb-1">Medical History</a>
                                    <a href="{{route('dashboard.user')}}" class="btn btn-secondary btn-sm mb-1">Your Profile</a>
                                </div>
                            </div>

                            @yield('content')
                        </div>
                    </div>
                </div>

                <div class="col-md-2"></div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>
