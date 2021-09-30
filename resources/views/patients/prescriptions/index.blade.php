@extends('layouts.accounts.user-dashboard')
@section('content')

<div class="col-md-12">
    <div class="appointment-wrapper p-3">
        <div class="table-responsive">
            <table class="table table-hover" >
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Disease</th>
                        <th scope="col">Symptoms</th>
                        <th scope="col">Medication</th>
                        <th scope="col">Note</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse (auth()->user()->patient->prescription as $prescribe)
                    <tr>
                        <td scope="row" id="patient">{{$prescribe->id}}</td>
                        <td>Dr. {{$prescribe->admin->name}}</td>
                        <td>{{$prescribe->disease}}</td>
                        <td>{{$prescribe->details}}</td>
                        <td>{{$prescribe->medicine}}</td>
                        <td>{{$prescribe->note}}</td>
                        <td>{{$prescribe->created_at->isoFormat('LL')}}</td>

                        <td class="d-flex justify-content-between">
                            <span class="mx-1">
                                <a href="#" class="btn btn-warning btn-sm">VIEW</a>
                            </span>

                            <span class="mx-1">
                                <a href="#" class="btn btn-warning btn-sm">Download</a>
                            </span>
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

@endsection
