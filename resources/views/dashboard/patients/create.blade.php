@extends('layouts.dashboard')
@section('content')

<div class="d-flex justify-content-between">
    <h4>Add Patient</h4>

    <h4>
        <a href="{{route('dashboard.patients.index')}}" class="btn btn-success btn-sm">CANCEL</a>
    </h4>
</div>


    <div class="section-container">
        <div class="row">
            <div class="col-xl-2"></div>
            <div class="col-xl-8">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
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


                        {{-- dob --}}
                        <div class="col-md-6 my-3">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Patient's DOB</label>
                                <input  class="form-control @error('dob') is-invalid @enderror"
                                        type="date" id="formFile"
                                        name="dob">

                                @error('dob')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- age --}}
                        <div class="col-md-6 my-3">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Patient's Age</label>
                                <input  class="form-control @error('age') is-invalid @enderror"
                                        type="text" id="formFile"
                                        name="age">

                                @error('age')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- region --}}
                        <div class="col-md-6 my-3">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Patient's region</label>
                                <select class="form-select @error('region') is-invalid @enderror"
                                        id="region" name="region"
                                        value="{{old('region')}}"
                                        style="width:100%;"
                                        required>

                                    <option>Select Region</option>
                                    <option value="accra">Greater Accra</option>
                                    <option value="volta">Volta Region</option>
                                    <option value="ashanti">Ashanti Region</option>
                                    <option value="central">Central Region</option>

                                </select>
                            </div>
                        </div>

                        {{-- locality --}}
                        <div class="col-md-6 my-3">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Patient's Locality</label>
                                <input  class="form-control @error('locality') is-invalid @enderror"
                                        type="text" id="formFile"
                                        name="locality">

                                @error('locality')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- next_of_kin --}}
                        <div class="col-md-6 my-3">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Patient's Next of Kin</label>
                                <input  class="form-control @error('next_of_kin') is-invalid @enderror"
                                        type="text" id="formFile"
                                        name="next_of_kin">

                                @error('next_of_kin')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- mobile --}}
                        <div class="col-md-6 my-3">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Patient's Mobile Number</label>
                                <input  class="form-control @error('mobile') is-invalid @enderror"
                                        type="text" id="formFile"
                                        name="mobile">

                                @error('mobile')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- emergency_contact --}}
                        <div class="col-md-6 my-3">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Emergenc Contact Number</label>
                                <input  class="form-control @error('emergency_contact') is-invalid @enderror"
                                        type="text" id="formFile"
                                        name="emergency_contact">

                                @error('emergency_contact')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- profile image --}}
                        <div class="col-md-6 my-3">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Profile Image</label>
                                <input  class="form-control @error('image') is-invalid @enderror"
                                        type="file" id="formFile"
                                        name="image">

                                @error('image')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- submit button --}}
                        <div class="col-md-6 my-5">
                            <button type="submit" class="btn btn-primary"
                                    style="width: 100%;">REGISTER</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-2"></div>
        </div>

    </div>

@endsection
