@extends('layouts.login')
@section('content')
<style>
    .login-container{
        padding: 15rem 0;

    }

    .login-form-box{
        background-color: #cecece;
        padding: 5rem;
        border-radius: 0.625rem;
    }

    #loginFooter{
        font-size: 1.2rem;
        font-weight: bolder;
        text-align: center;
    }
</style>


        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>

                <div class="col-md-6">
                    <div class="login-container">
                        <div class="text-center">
                            <h1><strong>Password Reset</strong></h1>
                        </div>

                        <div class="login-form-box">
                            <div class="mb-4 text-sm text-gray-600">
                                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                            </div>

                             <!-- Session Status -->
                             <div>
                                <span >
                                    <x-auth-session-status class="mb-4" :status="session('status')"/>
                                </span>

                            </div>

                            <!-- Validation Errors -->
                            <div>
                                <span>
                                    <x-auth-validation-errors class="mb-4" :errors="$errors"
                                    style="color: red;"/>
                                </span>
                            </div>

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <!-- Email Address -->
                                <div>
                                    <!-- Email Address -->
                                    <div class="my-3">
                                        {{-- <label for="exampleInputEmail1" class="form-label">Email address</label> --}}
                                        <input type="email" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                name="email" value="{{old('email')}}"
                                                autofocus
                                                placeholder="Enter email">
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-secondary my-2"
                                    style="width: 100%">Email Password Reset Link</button>

                                    <a href="{{route('admin.user.login')}}"
                                        class="btn btn-primary" style="width: 100%;">Back To Log In</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>


        </div>
@endsection
