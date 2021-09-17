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
</style>


<h4>Subscribers List</h4>
<div class="section-container">
    <table class="table table-responsive table-hover">
        <div class="mb-2">
            <a href="#" class="btn btn-success btn-sm">Add subscriber</a>
        </div>

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($subscribers as $subscriber)
            <tr>
                <td scope="row">{{$subscriber->id}}</td>
                <td>{{$subscriber->name}}</td>
                <td>{{$subscriber->email}}</td>
                <td>{{$subscriber->created_at->isoFormat('LL')}}</td>

                <td class="d-flex">
                    {{-- <span><a href="{{route('dashboard.blog.show', $subscriber)}}" class="btn btn-success btn-sm">VIEW</a></span> --}}
                    <span class="mx-1">
                        <form action="{{route('dashboard.blog.destroy', $subscriber->id)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm ml-2">REMOVE</button>
                        </form>
                    </span>
                </td>
            </tr>
            @empty
                <td>No subscribers</td>
            @endforelse
        </tbody>
      </table>
</div>

@endsection

