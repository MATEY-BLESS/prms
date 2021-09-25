<style>
    .site-main-nav{
        background-color: #e3f2fd;
        min-height: 50px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light site-main-nav sticky-top">
    <div class="container-md">
        {{-- brand logo or name --}}
        <div>
            <a class="navbar-brand" href="/">
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

            <form class="d-flex me-auto" action="#">
                <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search"
                    style="width: 300px;">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

            <div class="ms-3">
                <a href="{{ route('admin.user.login') }}" class="btn btn-secondary btn-sm">Admin</a>
                <a href="{{ route('admin.user.login') }}" class="btn btn-primary btn-sm">Doctor</a>
                <a href="{{ route('login') }}" class="btn btn-success btn-sm">Patient</a>
            </div>
        </div>

    </div>
</nav>
