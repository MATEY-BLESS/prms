@extends('layouts.doctor')

@section('content')

    <style>
        .main-stats{
            height: 100px;
        }

        .main-stats-detail{
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .main-stats,
        .site-performance,
        .top-articles,
        .extra-section{
            background-color: whitesmoke;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
        }

        .site-performance,
        .top-articles,
        .extra-section{
            min-height: 350px;
        }

        .stat-heading{
            font-weight: bold;
        }

        .site-performance-data{
            min-height: 90px;
            background-color: #ececec;
            border-radius: 10px;
            padding: 10px;
        }

        /* quick nav wrapper */
        .quick-nav-wrapper{
            margin-bottom: 2rem;
        }
        .doctor-name h1{
            font-weight: bolder;
            font-size: 2rem;
        }
    </style>






        <div class="quick-nav-wrapper d-flex justify-content-between align-items-center flex-wrap">
            <div class="doctor-name">
                <h1>Hello Dr. {{auth()->user()->name}}</h1>
            </div>


            <div>
                <a href="{{route('dashboard.doctors.patients.list')}}" class="btn btn-info btn-sm my-1">Patients</a>
                <a href="#" class="btn btn-info btn-sm my-1">Appointments</a>
                <a href="#" class="btn btn-info btn-sm my-1">Your Profile</a>
                <a href="#" class="btn btn-success btn-sm my-1">Your Settings</a>
            </div>
        </div>

        {{-- Section 1 --}}
            {{-- Brief Stats: section 1 --}}
            <div class="col-md-4">
                <div class="main-stats shadow-sm">
                    <h5 class="stat-heading">Your Patients</h5>
                    <div class="main-stats-detail">
                        <p><span><b>100</b></span> Total</p>
                        <p><span><b>5</b></span> Active</p>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="main-stats shadow-sm">
                    <h5 class="stat-heading">Appointments</h5>
                    <div class="main-stats-detail">
                        <p><span><b>100</b></span> Completed</p>
                        <p><span><b>5</b></span> Pending</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="main-stats shadow-sm">
                    <h5 class="stat-heading">Prescriptions</h5>
                    <div class="main-stats-detail">
                        <p><span><b>100</b></span> Given</p>
                        <p><span><b>5</b></span> Drafted</p>
                    </div>
                </div>
            </div>
        {{-- End section 1 --}}

        {{-- section 2 --}}
            {{-- Site Performance Overview --}}
            <div class="col-md-4">
                <div class="site-performance">
                    <h5 class="stat-heading">This Weeks Appointment</h5>
                    <small style="color: #b3adad">Total across all pages and articles.</small>
                    <div class="row">
                        {{-- page views --}}
                        <div class="col-md-6">
                            <div class="site-performance-data my-2">
                                <span><b>600</b></span>
                                <p class="my-1">Page Views</p>
                            </div>
                        </div>

                        {{-- visitors --}}
                        <div class="col-md-6">
                            <div class="site-performance-data my-2">
                                <span><b>600K</b></span>
                                <p class="my-1">Unique Visitors</p>
                            </div>
                        </div>

                        {{-- link shares --}}
                        <div class="col-md-6">
                            <div class="site-performance-data my-2">
                                <span><b>10K</b></span>
                                <p class="my-1">Link Shares</p>
                            </div>
                        </div>

                        {{-- comments --}}
                        <div class="col-md-6">
                            <div class="site-performance-data my-2">
                                <span><b>1K</b></span>
                                <p class="my-1">Total Comments</p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            {{-- Top Articles --}}
            <div class="col-md-8">
                <div class="top-articles">
                    <h5 class="stat-heading">Recent Patients</h5>
                </div>
            </div>
        {{-- End section 2 --}}

@endsection

