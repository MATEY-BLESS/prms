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

<div class="d-flex justify-content-between">
    <h4>EDIT ROLE: <b>{{$role->name}}</b></h4>
</div>



<div class="col-md-6">
    <div class="section-container">
        <form class="" action="{{route('dashboard.admin.role.update', $role)}}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                        <!-- name -->
                            <div class="form-group">
                                <label for="name" class="form-label">Role Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" placeholder="Enter tag name"
                                        name="name" value="{{$role->name}}"
                                        required>
                                <div class="valid-feedback">
                                Looks good!
                                </div>

                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                        {{-- buttons --}}
                        <div class="row my-3">
                            <div class="col-md-4">
                            <a href="{{route('dashboard.admin.role.index')}}" class="btn btn-success"
                            style="width: 100%;" >CANCEL</a>
                            </div>

                            <div class="col-md-8">
                            <button class="btn btn-primary" type="submit"
                            style="width: 100%;">UPDATE</button>
                            </div>
                        </div>
            </form>
    </div>
</div>

@endsection
