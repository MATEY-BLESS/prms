<style>
    .site-main-nav{
        background-color: white;
        min-height: 50px;
    }
</style>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <nav class="navbar navbar-expand-lg navbar-light site-main-nav sticky-top">
            <div class="container-fluid">
                {{-- brand logo or name --}}
                <div>
                    <a class="navbar-brand" href="{{route('dashboard.user')}}">
                        <strong>{{config('app.name')}}</strong>
                    </a>
                </div>

                {{-- other nav links: search, etc. --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        {{-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li> --}}
                    </ul>

                     <!-- Settings Dropdown -->
                        <div class="d-flex">

                            <span class="px-2">{{ Auth::user()->name }}</span>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                </div>

            </div>
        </nav>
    </div>
    <div class="col-md-2"></div>
</div>

