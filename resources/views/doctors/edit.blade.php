@extends('layouts.doctor')
@section('content')

<style>
    .existing-profile-image{
        margin: 3rem 40%;
    }
    .profile-image-wrapper{
        width: 200px;
        height: 200px;
        background-color: rgb(219, 219, 219);
        border-radius: 50%;
    }
    .profile-image-wrapper img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        padding: 1rem;
    }
</style>

{{-- Doctor's Patients --}}
<div class="col-md-12">
    <div class="top-articles">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h5 class="stat-heading">EDIT PROFILE</h5>

                <div class="existing-profile-image">
                    <div class="profile-image-wrapper">
                        <img src="{{asset($doctor->image)}}">
                    </div>
                </div>
                <form method="POST" action="{{ route('dashboard.doctor.update', $doctor->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

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
                                    name="name" value="{{$doctor->admin->name}}"
                                    disabled>
                        </div>

                        {{-- email --}}
                        <div class="col-md-6 my-3">
                            <label  for="#" class="form-label">Email</label>
                            <input  type="email" class="form-control"
                                    id="#" aria-describedby="emailHelp"
                                    name="email" value="{{$doctor->admin->email}}"
                                    disabled>
                        </div>

                        {{-- dob --}}
                        <div class="col-md-6 my-3">
                            <div class="form-group">
                                <label for="formFile" class="form-label">DOB</label>
                                <input  class="form-control @error('dob') is-invalid @enderror"
                                        type="date" id="formFile" value="{{$doctor->dob}}"
                                        name="dob">

                                @error('dob')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- age --}}
                        <div class="col-md-6 my-3">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Age</label>
                                <input  class="form-control @error('age') is-invalid @enderror"
                                        type="text" id="formFile" value="{{$doctor->age}}"
                                        name="age">

                                @error('age')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- qualification --}}
                        <div class="col-md-6 my-3">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Qualification</label>
                                <input  class="form-control @error('qualification') is-invalid @enderror"
                                        type="text" id="formFile" value="{{$doctor->qualification}}"
                                        name="qualification">

                                @error('qualification')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- region --}}
                        <div class="col-md-6 my-3">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Region</label>
                                <select class="form-select @error('region') is-invalid @enderror"
                                        id="region" name="region"
                                        value="{{old('region')}}"
                                        style="width:100%;">

                                    @if ($doctor->region)
                                    <option value="{{$doctor->region}}">{{$doctor->region}}</option>
                                    @endif

                                    <option>Select Region</option>

                                    <option value="accra">Greater Accra</option>
                                    <option value="volta">Volta Region</option>
                                    <option value="ashanti">Ashanti Region</option>
                                    <option value="central">Central Region</option>


                                </select>
                            </div>
                        </div>

                        {{-- religion --}}
                        <div class="col-md-6 my-3">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Religion</label>
                                <input  class="form-control @error('religion') is-invalid @enderror"
                                        type="text" id="formFile" value="{{$doctor->religion}}"
                                        name="religion">

                                @error('religion')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- next_of_kin --}}
                        <div class="col-md-6 my-3">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Next of Kin</label>
                                <input  class="form-control @error('next_of_kin') is-invalid @enderror"
                                        type="text" id="formFile" value="{{$doctor->next_of_kin}}"
                                        name="next_of_kin">

                                @error('next_of_kin')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- mobile --}}
                        <div class="col-md-6 my-3">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Mobile Number</label>
                                <input  class="form-control @error('mobile') is-invalid @enderror"
                                        type="text" id="formFile" value="{{$doctor->mobile}}"
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
                                        type="text" id="formFile" value="{{$doctor->emergency_contact}}"
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
                                    style="width: 100%;">UPDATE</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>

    </div>
</div>
{{-- End section 2 --}}

@endsection

