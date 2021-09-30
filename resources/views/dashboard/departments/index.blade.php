@extends('layouts.dashboard')
@section('content')
<style>
    .section-container{
        min-height: 190px;
        background-color: whitesmoke;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 15px;
    }
</style>

{{-- SECTION 1: --}}
    {{-- List of departments --}}
    <h4>List of Departments</h4>
    <div class="col-md-12">
        <div class="section-container">
            <div class="mb-4">
                <h5><b>Add department</b></h5>

                <form class="" action="{{route('dashboard.departments.store')}}"
                            method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                        <!-- name -->
                        <div class="col-md-10">
                            {{-- <label for="name">name</label> --}}
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" placeholder="Enter department name"
                                name="name" value="{{old('name')}}"
                                required>
                                <div class="valid-feedback">
                                Looks good!
                                </div>

                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-primary" type="submit">ADD</button>
                        </div>


                  </div>
                </form>
            </div>
            <table class="table table-responsive table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($departments as $department)
                    <tr>
                        <td scope="row">{{$department->id}}</td>
                        <td>{{Str::ucfirst($department->name)}}</td>
                        <td>{{$department->created_at->isoFormat('LL')}}</td>
                        <td>{{$department->admin->name}}</td>

                        <td class="d-flex">
                            <span><a href="{{route('dashboard.departments.edit', $department)}}" class="btn btn-success btn-sm">EDIT</a></span>
                            <span class="mx-1">
                                <form action="{{route('dashboard.departments.destroy', $department)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm ml-2">DELETE</button>
                                </form>
                            </span>
                        </td>
                    </tr>
                    @empty
                        <td>No departments</td>
                    @endforelse
                </tbody>
              </table>
        </div>
    </div>

    {{-- Add department --}}
    <div class="col-md-6">

    </div>
{{-- END SECTION 1 --}}

@endsection
