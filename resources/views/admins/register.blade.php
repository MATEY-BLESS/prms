@extends('layouts.dashboard')
@section('content')



    <div class="row">
        <div class="col-md-5">
            <div class="d-flex justify-content-between">
                <h4>Register New Admin</h4>

                <h4>
                    <a href="{{route('dashboard.admin.index')}}" class="btn btn-success btn-sm">CANCEL</a>
                </h4>
            </div>

            <form method="POST" action="{{ route('admin.register') }}" enctype="multipart/form-data">
                @csrf

                <!-- Validation Errors -->
                <div>
                    <span>
                        <x-auth-validation-errors class="mb-4" :errors="$errors"
                        style="color: red;"/>
                    </span>
                </div>

                <div class="p-4" style="background-color: white;">
                    {{-- full name --}}
                    <div class="mb-3">
                        <label  for="#" class="form-label">Full Name</label>
                        <input  type="text" class="form-control"
                                id="#" aria-describedby="emailHelp"
                                name="name" value="{{old('name')}}"
                                required>
                    </div>

                    {{-- email --}}
                    <div class="mb-3">
                        <label  for="#" class="form-label">Email</label>
                        <input  type="email" class="form-control"
                                id="#" aria-describedby="emailHelp"
                                name="email" value="{{old('email')}}"
                                required>
                    </div>

                    {{-- role --}}
                    <div class="mt-4">
                        <label for="#" class="form-label">Role</label>
                        <select name="role" id=""
                                class="rounded" value="{{old('role')}}"
                                style="width: 100%; height: 35px;">

                            <option value="">Select Role</option>

                            @forelse ($roles as $role)
                                <option value="{{$role->slug}}">{{$role->name}}</option>
                            @empty
                                <option value="">No role yet.</option>
                            @endforelse
                        </select>
                    </div>

                    {{-- password --}}
                    <div class="my-3">
                        <label for="password" class="form-label">Password</label>
                        <input  type="password" class="form-control"
                                name="password" id="password"
                                required autocomplete="new-password">
                    </div>

                    {{-- confirm password --}}
                    <div class="mb-3">
                        <label  for="password_confirmation" class="form-label">Confirm Password</label>
                        <input  type="password" class="form-control"
                                id="password_confirmation" name="password_confirmation"
                                required>
                    </div>

                    {{-- submit button --}}
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="btn btn-primary"
                                style="width: 100%;">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
