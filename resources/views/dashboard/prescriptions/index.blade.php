@extends('layouts.dashboard')
@section('content')

<div class="d-flex justify-content-between">
    <h4>List of  prescriptions</h4>
    <h4>
        <a href="#" class="btn btn-success btn-sm">Add prescription</a>
    </h4>
</div>

<div class="section-container">
    @if ($prescriptions->count() > 0)

        <div id="tableView">
            <table class="table table-responsive table-hover" >
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Doctor Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Prescription</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($prescriptions as $prescription)
                    <tr>
                        <td scope="row" id="prescription">{{$prescription->id}}</td>
                        <td>{{$prescription->patient->user->name}}</td>
                        <td>{{$prescription->doctor->admin->name}}</td>
                        <td>{{$prescription->created_at->isoFormat('LL')}}</td>

                        <td class="d-flex justify-content-between">
                            <a href="#" class="btn btn-success btn-sm">VIEW</a>
                        </td>
                    </tr>
                    @empty
                        <td>No prescriptions</td>
                    @endforelse
                </tbody>
            </table>
        </div >

    @else

        <div class="list-else-message">
            <span >No prescriptions.</span>
            <div class="my-4">
                <span class="fs-2">All <b>prescriptions</b> will show here in table with grid view option.</span>
            </div>
        </div>

    @endif
</div>

@endsection
