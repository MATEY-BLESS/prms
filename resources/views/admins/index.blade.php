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


<div class="d-flex justify-content-between">
    <h4>List of Admins</h4>

    <h4>
        <a href="{{route('dashboard.admin.create')}}" class="btn btn-success btn-sm">Add Admin</a>
    </h4>
</div>

<div class="col-md-12">
    <div class="section-container">
        <table class="table table-responsive table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($admins as $admin)
                <tr>
                    <td>{{$admin->id}}</td>
                    <td>
                        <img src="{{asset($admin->image)}}" alt=""
                                style="background-color: #cecece; border-radius: 50%;" height="30" width="30">
                    </td>
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->role->name}}</td>
                    <td>{{$admin->created_at->isoFormat('LL')}}</td>

                    <td class="d-flex">
                        <span><a href="{{route('admin.profile.view', $admin->id)}}" class="btn btn-success btn-sm">VIEW</a></span>
                        <span class="ms-1" ><a href="#" class="btn btn-primary btn-sm">EDIT</a></span>
                        <span class="mx-1">
                            <form action="#" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm ml-2">DELETE</button>
                            </form>
                        </span>
                        <span><a href="#" class="btn btn-secondary btn-sm">SUSPEND</a></span>


                    </td>
                </tr>
                @empty
                    <td>No admins</td>
                @endforelse
            </tbody>
          </table>
    </div>
</div>

@endsection

