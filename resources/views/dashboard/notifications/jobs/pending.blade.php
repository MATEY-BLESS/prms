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

    .list-else-message{
        text-align: center;
        padding: 100px;
        color: #b1aeae;
        font-size: 1rem;
    }
</style>

<div class="d-flex justify-content-between">
    <h4 class="">
        Notifications
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6-6-6z"/></svg>
        jobs
    </h4>

</div>


<div class="section-container">

    @if ($jobs->count() > 0)
    <table class="table table-responsive table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Queue</th>
                <th scope="col">Payload</th>
                <th scope="col">Attempts</th>
                <th scope="col">Date Created</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($jobs as $job)
            <tr>
                <td scope="row">{{$job->id}}</td>
                <td>{{$job->queue}}</td>
                <td>Payload</td>
                <td>{{$job->attempts}}</td>
                <td>{{$job->created_at}}</td>
                {{-- <td>{{$job->action}}</td> --}}
            </tr>
            @empty
                <td>No jobs</td>
            @endforelse
        </tbody>
    </table>
    @else
    <div class="list-else-message">
        <span >No Jobs Pending</span>
        <div class="my-4">
            <span class="fs-2">Pending <b>jobs</b> will appear here.</span>
        </div>
    </div>

    @endif



</div>


@endsection
