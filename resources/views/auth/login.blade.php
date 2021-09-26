@extends('layouts.login')
@section('content')
<style>
    .login-container{
        padding: 12rem 0;

    }

    .login-form-box{
        background-color: #cecece;
        border-radius: 0.625rem;
        height: 31.25rem;
    }

    #loginFooter{
        font-size: 1.2rem;
        font-weight: bolder;
        text-align: center;
    }

    .user-login-left{
        height: 100%;
        padding: 10rem 2rem;
        color: white;
        background-image: linear-gradient( 135deg, #CE9FFC 10%, #7367F0 100%);

    }

    .user-login-right{
        height: 100%;
        padding: 3rem;
        background-color: white;
    }

    #mainHeadings{
        font-family: 'Passion One', cursive;
        font-weight: lighter;
    }

    .social-fb-login{
        background-color: #4267B2;
        border-radius: 5px;
    }

    .social-google-login{
        background-color: whitesmoke;
        border-radius: 5px;
    }
    .social-login a{
       text-decoration: none;
       color: white;
    }
</style>
@include('includes.frontend.header')
    <div class="container">
        <div class="row login-container">
            <div class="col-lg-2"></div>

            <div class="col-lg-8">
                {{-- <div class="text-center">
                    <h1><strong>ADMIN LOGIN</strong></h1>
                </div> --}}
                <div class="row g-0 login-form-box shadow-sm">
                    {{-- something here --}}
                    <div class="col-lg-4">
                        <div class="user-login-left">
                            <h1 class="fs-1"><b>PRMS</b></h1>
                            <h5>Patients Management</h5>
                        </div>
                    </div>


                    {{-- login form here --}}
                    <div class="col-lg-8">
                        <div class="user-login-right">

                            <div class="d-flex justify-content-between align-items-center">
                                <h2 id="mainHeadings"><strong>Sign In</strong></h2>
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                                    {{ __('Create Account') }}
                                </a>
                            </div>

                             <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email Address -->
                                <div class="my-3">
                                    {{-- <label for="exampleInputEmail1" class="form-label">Email address</label> --}}
                                    <input type="email" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                            name="email" value="{{old('email')}}"
                                            autofocus
                                            placeholder="Enter email">
                                </div>

                                <!-- Password -->
                                <div class="my-3">
                                    {{-- <label for="password" class="form-label">Email address</label> --}}
                                    <input type="password" class="form-control"
                                            id="password" aria-describedby="passwordHelp"
                                            name="password" value="{{old('password')}}"
                                            autocomplete="current-password"
                                            placeholder="Enter password">
                                </div>

                                <!-- Remember Me -->
                                <div class="d-flex my-3 justify-content-between">
                                    <div>
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1"
                                                name="remember">Remember me</label>
                                    </div>

                                    <div>
                                        @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                    </div>

                                </div>

                                <div class="my-2">
                                    <button type="submit" class="btn btn-primary"
                                        style="width: 100%; color: white;">Log In</button>
                                </div>
                            </form>

                            {{-- social login --}}
                            <hr class="">

                            <div class="text-center">
                                <span>Or</span>

                                {{-- google login --}}
                                <div class="p-1 social-google-login shadow-sm" style="width: 100%">
                                    <span class="d-flex align-items-center px-3 social-login">
                                        <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="32px" height="32px"><path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"/><path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"/><path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"/><path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"/></svg>
                                        <a href="#" class="px-3" style="color: black">Continue with Google</a>
                                    </span>
                                </div>

                                {{-- fb login --}}
                                <div class="p-1 my-3 social-fb-login" style="width: 100%">
                                    <span class="d-flex align-items-center px-3 social-login">
                                        <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="32px" height="32px"><path fill="#3F51B5" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5V37z"/><path fill="#FFF" d="M34.368,25H31v13h-5V25h-3v-4h3v-2.41c0.002-3.508,1.459-5.59,5.592-5.59H35v4h-2.287C31.104,17,31,17.6,31,18.723V21h4L34.368,25z"/></svg>
                                        <a href="#" class="px-3" >Continue with Facebook</a>
                                    </span>
                                </div>

                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                                    {{ __('Create Account') }}
                                </a>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
            <div class="col-lg-2"></div>
        </div>


    </div>

@endsection

