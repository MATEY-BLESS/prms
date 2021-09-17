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

<h4>Account Users</h4>
<div class="col-md-12">
    <div class="section-container">
        <table class="table table-responsive table-hover">

            <div class="mb-2">
                {{-- <a href="#" class="btn btn-success btn-sm">Add user</a> --}}
            </div>

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>
                        <img src="{{asset($user->image)}}" alt=""
                                style="background-color: #cecece; border-radius: 50%;" height="30" width="30">
                    </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->created_at->isoFormat('LL')}}</td>

                    <td class="d-flex">
                        <span><a href="#" class="btn btn-success btn-sm">VIEW</a></span>
                        <span class="mx-1">
                            <form action="{{route('dashboard.user-account.destroy', $user->id)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm ml-2">DELETE</button>
                            </form>
                        </span>
                        <span><a href="#" class="btn btn-secondary btn-sm">SUSPEND</a></span>


                    </td>
                </tr>
                @empty
                    <td>No users</td>
                @endforelse
            </tbody>
          </table>
    </div>
</div>

@endsection

