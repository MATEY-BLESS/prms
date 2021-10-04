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
                <h5 class="stat-heading">CHANGE PASSWORD</h5>
                <form method="POST" action="{{route('dashboard.doctor.password_update', $doctor->admin->id)}}" enctype="multipart/form-data">
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

