@extends('layouts.accounts.user-dashboard')
@section('content')

<style>
    .prescription-text{
        background-color: white;
        /* width: 40%; */
        padding: 1rem;
        text-align: center;
        margin-bottom: 1rem;
    }

</style>
<div class="col-md-12">
    <div class="appointment-wrapper p-3">
        <div class="px-5 text-center">
            <h1 class="mb-3">
                <b>Prescription for {{$prescription->disease}}</b>
            </h1>


            <div class="prescription-text">
                <h5>Symptom's Deatil</h5>
                <p>{{$prescription->details}}</p>
            </div>

            <div class="prescription-text">
                <h5>Medication/ Medicine</h5>
                <p>{{$prescription->medicine}}</p>
            </div>

            <div class="prescription-text">
                <h5>Any Note</h5>
                <p>{{$prescription->note}}</p>
            </div>

            <h5>By: Dr. {{$prescription->doctor->admin->name}} </h5>
        </div>
    </div>
</div>

@endsection
