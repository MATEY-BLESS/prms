@extends('layouts.dashboard')
@section('content')
    <h1>Add New Admin User</h1>
    <div class="row">
        <div class="col-md-5">
            <form method="POST" action="{{ route('admin.register') }}">
                @csrf
                <div class="p-4" style="background-color: white;">
                    {{-- full name --}}
                    <div class="mb-3">
                        <label for="#" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="#" aria-describedby="emailHelp"
                                name="name" value="{{$admin->name}}">
                    </div>

                    {{-- email --}}
                    <div class="mb-3">
                        <label for="#" class="form-label">Email</label>
                        <input type="email" class="form-control" id="#" aria-describedby="emailHelp"
                                name="email" value="{{$admin->email}}">
                    </div>

                    {{-- role --}}
                    <div class="mt-4">
                        <label for="#" class="form-label">Role</label>

                        <select name="role" id="" class="rounded" value="{{old('role')}}" style="width: 100%; height: 35px;">
                            <option selected value="{{$admin->role}}">{{$admin->role}}</option>

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
                        <input type="password" class="form-control" name="password" id="password"
                                required autocomplete="new-password" value="{{$admin->password}}">
                    </div>

                    {{-- confirm password --}}
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" value="{{$admin->password}}" required>
                    </div>

                    {{-- submit button --}}
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
