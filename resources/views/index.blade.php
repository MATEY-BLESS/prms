@extends('layouts.app')
@section('content')

<style>
    .remove-later{
        padding-top: 10rem;
    }

    .main-heading{
        font-family: 'Roboto Slab', serif;
        font-weight: 100;
        /* font-size: 3rem; */
    }
    .subheading{
        font-family: 'Roboto Slab', serif;
        font-size: 1.5rem;
        color: limegreen;
    }
</style>

<div class="remove-later">

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>

            <div class="col-md-6 text-center">
                <div class="main-heading">
                    <span class="fs-1">Elegan entry to your  web application. Some call it <strong>homepage</strong>
                        and others <strong>landing page</strong>.</span>
                </div>

                <div class="my-5 subheading">
                    <span>Just build something awesome.</span>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
