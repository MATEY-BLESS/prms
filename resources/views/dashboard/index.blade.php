@extends('layouts.dashboard')
@section('content')

<style>
    .main-stats{
        height: 190px;
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
                <h5 class="stat-heading">Articles</h5>
                <p><span><b>100</b></span> Published</p>
                <p><span><b>5</b></span> Drafted</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="main-stats shadow-sm">
                <h5 class="stat-heading">Account Users</h5>
                <p><span><b>100</b></span> Published</p>
                <p><span><b>5</b></span> Drafted</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="main-stats shadow-sm">
                <h5 class="stat-heading">Subscribers</h5>
                <p><span><b>100</b></span> Published</p>
                <p><span><b>5</b></span> Drafted</p>
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
                <h5 class="stat-heading">Top Performing Articles</h5>
            </div>
        </div>
    {{-- End section 2 --}}


    {{-- Section 3 --}}
        {{-- Something exxtra on the dashboard --}}
        <div class="col-md-6">
            <div class="extra-section">
                <h5 class="stat-heading">Something Extra Here</h5>
            </div>
        </div>

        {{-- Something extra here --}}
        <div class="col-md-6">
            <div class="extra-section">
                <h5 class="stat-heading">Something Extra Here</h5>
            </div>
        </div>

    {{-- End Section 3 --}}



@endsection
