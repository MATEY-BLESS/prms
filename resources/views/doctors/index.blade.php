@extends('layouts.doctor')

@section('content')


        {{-- Section 1 --}}
            {{-- Brief Stats: section 1 --}}
            <div class="col-md-4">
                <div class="main-stats shadow-sm">
                    <h5 class="stat-heading">Your Patients</h5>
                    <div class="main-stats-detail">
                        <p><span><b>0</b></span> Total</p>
                        <p><span><b>0</b></span> Active</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="main-stats shadow-sm">
                    <h5 class="stat-heading">Appointments</h5>
                    <div class="main-stats-detail">
                        <p><span><b>0</b></span> Completed</p>
                        <p><span><b>0</b></span> Pending</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="main-stats shadow-sm">
                    <h5 class="stat-heading">Prescriptions</h5>
                    <div class="main-stats-detail">
                        <p><span><b>0</b></span> Given</p>
                        <p><span><b>0</b></span> Drafted</p>
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

