@extends('layouts.dashboard')

@section('content')

<style>
    .main-stats{
        height: 100px;

    }
    .main-stats-wrapper{
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

</style>



    <h4>Welcome to Dashboard</h4>

    {{-- Section 1 --}}
        {{-- Brief Stats: section 1 --}}
        <div class="col-md-4">
            <div class="main-stats shadow-sm">
                <h5 class="stat-heading">Doctors</h5>

                <div class="main-stats-wrapper">
                    <p><span><b>{{$doctors->count()}}</b></span> Added</p>
                    <p><span><b>n/a</b></span> Active</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="main-stats shadow-sm">
                <h5 class="stat-heading">Patients</h5>
                <div class="main-stats-wrapper">
                    <p><span><b>{{$patients->count()}}</b></span> Total</p>
                    <p><span><b>n/a</b></span> Active</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="main-stats shadow-sm">
                <h5 class="stat-heading">Appointments</h5>
                <div class="main-stats-wrapper">
                    <p><span><b>{{$appointments->count()}}</b></span> Received</p>
                    <p><span><b>n/a</b></span> Assigned</p>
                </div>

            </div>
        </div>
    {{-- End section 1 --}}

    {{-- section 2 --}}
        {{-- Site Performance Overview --}}
        <div class="col-md-4">
            <div class="site-performance">
                <h5 class="stat-heading">Site Performance</h5>
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
                <h5 class="stat-heading">New Patients Awaiting Appointment</h5>
            </div>
        </div>
    {{-- End section 2 --}}

@endsection
