@extends('layouts.dashboard')
@section('content')

<div class="d-flex justify-content-between">
    <h4>Add Doctor</h4>

    <h4>
        <a href="{{route('dashboard.doctors.index')}}" class="btn btn-success btn-sm">CANCEL</a>
    </h4>
</div>


    <div class="section-container">
        <div class="row">
            <div class="col-xl-2"></div>
            <div class="col-xl-8">
                <form method="POST" action="{{ route('admin.register') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Validation Errors -->
                    <div>
                        <span>
                            <x-auth-validation-errors class="mb-4" :errors="$errors"
                            style="color: red;"/>
                        </span>
                    </div>

                    <div class="row" style="background-color: white;">
                        {{-- full name --}}
                        <div class="col-md-6 my-3">
                            <label  for="#" class="form-label">Full Name</label>
                            <input  type="text" class="form-control"
                                    id="#" aria-describedby="emailHelp"
                                    name="name" value="{{old('name')}}"
                                    required>
                        </div>

                        {{-- email --}}
                        <div class="col-md-6 my-3">
                            <label  for="#" class="form-label">Email</label>
                            <input  type="email" class="form-control"
                                    id="#" aria-describedby="emailHelp"
                                    name="email" value="{{old('email')}}"
                                    required>
                        </div>

                        {{-- password --}}
                        <div class="col-md-6 my-3">
                            <label for="password" class="form-label">Password</label>
                            <input  type="password" class="form-control"
                                    name="password" id="password"
                                    required autocomplete="new-password">
                        </div>

                        {{-- confirm password --}}
                        <div class="col-md-6 my-3">
                            <label  for="password_confirmation" class="form-label">Confirm Password</label>
                            <input  type="password" class="form-control"
                                    id="password_confirmation" name="password_confirmation"
                                    required>
                        </div>

                        {{-- role --}}
                        <div class="col-md-6 my-3">
                            <label for="#" class="form-label">Role</label>
                            <select name="role_id" id=""
                                    class="rounded" value="{{old('role_id')}}"
                                    style="width: 100%; height: 35px;">

                                <option value="">Select Role</option>

                                @forelse ($roles as $role)
                                    <option value="{{$role->id}}">{{Str::ucfirst($role->name)}}</option>
                                @empty
                                    <option value="">No role yet.</option>
                                @endforelse
                            </select>
                        </div>

                        {{-- department --}}
                        <div class="col-md-6 my-3">
                            <label for="#" class="form-label">Department</label>
                            <select name="department_id" id=""
                                    class="rounded" value="{{old('department')}}"
                                    style="width: 100%; height: 35px;">

                                <option value="">Select department</option>

                                @forelse ($departments as $department)
                                    <option value="{{$department->id}}">{{Str::ucfirst($department->name)}}</option>
                                @empty
                                    <option value="">No department yet.</option>
                                @endforelse
                            </select>
                        </div>

                        {{-- submit button --}}
                        <div class="col-md-6 my-5">
                            <button type="submit" class="btn btn-primary"
                                    style="width: 100%;">Register</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-2"></div>
        </div>

    </div>

@endsection
