@extends('layouts.dashboard')
@section('content')
<style>
    .section-container{
        min-height: 600px;
        background-color: whitesmoke;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 15px;
    }

    .campaign-side-link{
        min-height: 190px;
        background-color: #ececec;
    }
</style>


<h4>Campaigns</h4>

<div class="section-container">

    <div class="row">
        <div class="col-md-3">
            <div class="campaign-side-link">
                <a href="{{route('dashboard.newsletter.index')}}" class="btn btn-primary">Newsletter</a>
                <a href="{{route('dashboard.seasonal-message.index')}}" class="btn btn-secondary">Seasonal Message</a>
            </div>

        </div>

        <div class="col-md-9">

        </div>
    </div>

</div>


@endsection
