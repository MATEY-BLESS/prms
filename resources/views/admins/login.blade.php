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
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div class="text-center mb-5">
                        <a href="/" class="btn btn-success">BACK TO SITE</a>
                    </div>
                    <div class="text-center">
                        <h1><strong>ADMIN LOGIN</strong></h1>
                    </div>

                    <div class="login-form-box">
                        <form method="POST" action="{{ route('admin.login') }}">
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
                                    style="width: 100%">Log In</button>

                                <div class="my-3 text-center">
                                    <span id="loginFooter">Login Challenges? Contact Senior Admin</span>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-3"></div>
        </div>


    </div>

@endsection

