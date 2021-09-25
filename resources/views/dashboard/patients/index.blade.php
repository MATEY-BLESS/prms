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
                        <td scope="row" id="patient">{{$patient->id}}</td>
                        <td>{{$patient->name}}</td>
                        <td>
                            <img src="{{asset($patient->image)}}"
                                    width="50" height="50" style="border-radius: 50px;">
                        </td>
                        <td>{{$patient->created_at->isoFormat('LL')}}</td>

                        <td>Who added patient</td>

                        <td class="d-flex justify-content-between">
                            <span>
                                <a href="{{route('dashboard.patient.doctor.assign', $patient->id)}}" class="btn btn-info btn-sm">Assign Doctor</a>
                            </span>

                            <span><a href="{{route('dashboard.patients.show', $patient)}}" class="btn btn-success btn-sm">VIEW</a></span>
                            <span class="mx-1"><a href="{{route('dashboard.patients.edit', $patient)}}"
                                    class="btn btn-warning btn-sm">EDIT</a></span>
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

    @else

        <div class="list-else-message">
            <span >No patients.</span>
            <div class="my-4">
                <span class="fs-2">All <b>patients</b> will show here in table with grid view option.</span>
            </div>
        </div>

    @endif
</div>

@endsection
