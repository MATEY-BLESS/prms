@extends('layouts.doctor')

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

        /* quick nav wrapper */
        .quick-nav-wrapper{
            margin-bottom: 2rem;
        }
        .doctor-name h1{
            font-weight: bolder;
            font-size: 2rem;
        }
    </style>





        {{-- quick navs --}}
        <div class="quick-nav-wrapper d-flex justify-content-between align-items-center">
            <div class="doctor-name">
                <h1>Hello Dr. {{auth()->user()->name}}</h1>
            </div>


            <div>
                <a href="{{route('dashboard.doctors.patients.list')}}" class="btn btn-info btn-sm">Patients</a>
                <a href="#" class="btn btn-info btn-sm">Appointments</a>
                <a href="#" class="btn btn-info btn-sm">Your Profile</a>
                <a href="#" class="btn btn-success btn-sm">Your Settings</a>
            </div>

        </div>


            {{-- Doctor's Patients --}}
            <div class="col-md-12">
                <div class="top-articles">
                    <h5 class="stat-heading">Recent Patients</h5>

                    <div class="table-responsive">
                        <table class="table table-hover" >
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Patient Name</th>
                                    <th scope="col">Profile Image</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Assigned By</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse (auth()->user()->patients as $patient)
                                <tr>
                                    <td scope="row" id="patient">{{$patient->id}}</td>
                                    <td>{{$patient->user->name}}</td>
                                    <td>
                                        <img src="{{asset($patient->user->image)}}"
                                                width="50" height="50" style="border-radius: 50px;">
                                    </td>
                                    <td>{{$patient->created_at->isoFormat('LL')}}</td>

                                    <td>Who added patient</td>

                                    <td class="d-flex justify-content-between">
                                        <span><a href="{{route('dashboard.patients.show', $patient)}}" class="btn btn-success btn-sm">VIEW PROFILE</a></span>

                                        <span class="mx-1"><a href="#"
                                            class="btn btn-warning btn-sm">Give Prescription</a></span>

                                        <span class="mx-1"><a href="#"
                                            class="btn btn-warning btn-sm">Send Message</a></span>

                                        <span class="mx-1"><a href="#"
                                                class="btn btn-danger btn-sm">RE-ASSIGN</a></span>
                                    </td>


                                </tr>
                                @empty
                                    <td>No patients</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        {{-- End section 2 --}}

@endsection

