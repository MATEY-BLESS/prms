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

    .list-else-message{
        text-align: center;
        padding: 100px;
        color: #b1aeae;
        font-size: 1rem;
    }

    .grid-view{
        /* width: 200px; */
        min-height: 200px;
        display: none;
    }

    #testing{
        height: 300px;
        display: none;
    }

    .grid-view-image{
        height: 150px;
        background-color: #cecece;
    }

    .grid-view-image img{
        width: 100%;
        height: 100%;
        object-fit: cover;

    }

    .grid-view-name{
        background-color: white;
        height: 80px;
    }

    .grid-view-date{
        height: 30px;
        background-color: white;
    }
    .extra-details{
        border-top: 1px solid #cecece;
        background-color: white;
        height: 40px;
    }

    #table{
        display: none;
    }

    #tableView{
        width: 100%;
    }

    .patient-admin-label{
        font-size: 12px;
        color: darkblue;
        font-family: 'Passion One', cursive;
        font-weight: lighter;
    }
</style>


<div class="d-flex justify-content-between">
    <h4>List of  Patients</h4>
    <h4>
        <a href="{{route('dashboard.patients.create')}}" class="btn btn-success btn-sm">Add Patient</a>
    </h4>
</div>

<div class="section-container">
    @if ($patients->count() > 0)
        <div class="d-flex justify-content-between">
            <div class="mb-2">
                <input class="btn btn-secondary btn-sm" type="button" value="TABLE" id="table">
                <input class="btn btn-secondary btn-sm" type="button" value="GRID" id="grid">
            </div>

        </div>

        <div id="tableView">
            <table class="table table-responsive table-hover" >
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Profile Image</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Added By</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($patients as $patient)
                    <tr>
                        <td scope="row">{{$patient->id}}</td>
                        <td>{{$patient->name}}</td>
                        <td>
                            <img src="{{asset($patient->image)}}"
                                    width="50" height="50" style="border-radius: 50px;">
                        </td>
                        <td>{{$patient->created_at->isoFormat('LL')}}</td>

                        <td>Who added patient</td>

                        <td class="d-flex">
                            <span><a href="{{route('dashboard.patients.show', $patient)}}" class="btn btn-success btn-sm">VIEW</a></span>
                            <span class="mx-1"><a href="{{route('dashboard.patients.edit', $patient)}}" class="btn btn-primary btn-sm">EDIT</a></span>
                            <span >
                                <form action="{{route('dashboard.patients.destroy', $patient->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm ml-2">DELETE</button>
                                </form>
                            </span>


                        </td>


                    </tr>
                    @empty
                        <td>No patients</td>
                    @endforelse
                </tbody>
            </table>
        </div >


        {{-- GRID VIEW --}}
        <div class="row">
            @forelse ($patients as $patient)

                <div class="col-sm-6 col-md-4 col-xxl-3">

                    <div class="grid-view my-3" id="testing">
                        {{-- image --}}
                        <div class="grid-view-image">
                            <img src="{{asset($patient->image)}}">
                        </div>

                        {{-- heading --}}
                        <div class="">
                            <div class="grid-view-name px-2">
                                <h6 class="py-2">
                                    <b>{{$patient->name}}</b>
                                </h6>
                            </div>

                            <div class="d-flex justify-content-between align-items-center px-2 grid-view-date">
                                <small>{{$patient->created_at->isoFormat('LL')}}</small>
                                {{-- <small>{{$patient->admin->name}}</small> --}}
                                @if ($patient->admin)
                                <small>
                                    {{-- {{$patient->admin->name}} --}}
                                    <div>
                                        <small class="patient-admin-label">
                                        <strong>Admin</strong></small>
                                    </div>

                                </small>
                                @elseif ($patient->user)
                                    <small>{{$patient->user->name}}</small>
                                @endif
                            </div>
                        </div>

                        {{-- extra details --}}
                        <div class="d-flex justify-content-between extra-details p-2">
                            <small>20K</small>
                            <small><a href="{{route('dashboard.patients.show', $patient)}}" class="btn btn-primary btn-sm py-0">VIEW</a></small>
                            <small class="">
                                <form action="{{route('dashboard.patients.destroy', $patient->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm py-0">DELETE</button>
                                </form>
                            </small>
                        </div>

                    </div>

                </div>

            @empty
                <td>No patients</td>
            @endforelse
        </div>


    @else

        <div class="list-else-message">
            <span >No patients.</span>
            <div class="my-4">
                <span class="fs-2">All <b>patients</b> will show here in table with grid view option.</span>
            </div>
        </div>

    @endif
</div>


<script>
    'use strict'

    const grid = document.getElementById("grid");
    const table = document.getElementById("tableView");
    const gridView = document.querySelectorAll(".grid-view");
    var i;

    grid.addEventListener("click", ()=>{
        // loop/ foreach
        for(i = 0; i < gridView.length; i++){
            gridView[i].style.display = "block";
        }
        table.style.display = "none";

        document.querySelector("#table").style.display = "inline-block";
    })

    document.getElementById("table").addEventListener("click", ()=>{
        for(i = 0; i < gridView.length; i++){
            gridView[i].style.display = "none";
        }

        table.style.display = "inline-block";
        document.querySelector("#table").style.display = "none";
    })
</script>
@endsection
