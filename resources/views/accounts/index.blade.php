@extends('layouts.accounts.user-dashboard')
@section('content')
<style>
    .dashboard-hero{
        /* background-color: lawngreen; */
        background: linear-gradient(103deg, rgb(3, 239, 98) 0%, rgb(3, 239, 98) 65%, rgb(5, 25, 45) 65%, rgb(5, 25, 45) 100%);
        width: 100%;
        height: 17.5rem;
        border-radius: 10px;
        padding: 2.5rem;
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
    .stats-special-highlight,
    .stats-element-box-2{
        width: 100%;
        background-color: whitesmoke;
        border-radius: 10px;
        border:1px solid #dee1e4;
    }

    .stats-element-box{
        height: 5.625rem;
    }

    .stats-special-highlight{
        height: 3.625rem;
    }
    .stats-element-box-2{
        height: 30rem;
    }

    .stats-element-box:hover,
    .stats-special-highlight:hover,
    .stats-element-box-2:hover{
        border:1px solid lime;
    }

</style>
    {{-- dashboard hero --}}
    <div class="col-md-12">
        <div class="dashboard-hero">
            <h2>Your Dashboard</h2>

            <div class="dashboard-hero-text">
                <span class="lead">Elements on the <b>user dashboard</b> will depend on application use case or business logic.
                    Examples: Students, Tutors, Creators account etc.
                </span>
            </div>


            {{-- subheading --}}
            <div class="dashboard-hero-subheading">
                <span>Be expressive as you can!</span>
            </div>
        </div>

    </div>


    {{-- SECTION 1: Stats Overview --}}

    <div class="col-md-4">
        <div class="stats-element-box my-4 shadow-sm">

        </div>
    </div>

    <div class="col-md-4">
        <div class="stats-element-box my-4 shadow-sm">

        </div>
    </div>

    <div class="col-md-4">
        <div class="stats-element-box my-4 shadow-sm">

        </div>
    </div>

    {{-- SECTION2: Something cool here --}}

    <div class="col-md-12">
        <div class="stats-special-highlight">

        </div>
    </div>

    {{-- SECTION 3: Empty spacce --}}
    <div class="col-md-6">
        <div class="stats-element-box-2 my-4 shadow-sm">

        </div>
    </div>

    <div class="col-md-6">
        <div class="stats-element-box-2 my-4 shadow-sm">

        </div>
    </div>
@endsection
