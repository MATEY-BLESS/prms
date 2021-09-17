<style>
    .side-nav-box{
        background-color: #05192d;
        min-height: 100vh;
    }

    .side-nav-main{
        position: fixed; /* Fixed Sidebar (stay in place on scroll) */
        z-index: 1; /* Stay on top */
        top: 0; /* Stay at the top */
        left: 0;
        overflow-x: hidden; /* Disable horizontal scroll */
        padding-top: 20px;
        margin-top: 4.375rem;
    }
    .side-nav-items {
        list-style: none;
        /* padding: 0; */
    }

    .side-nav-items li{
        margin-bottom: 10px;
    }

    .side-nav-items li svg{
        margin-right: 10px;
        color: white;
    }
    .side-nav-items li a{
        text-decoration: none;
        color: white;
    }

    /* MEDIA QUERY */
        @media (max-width: 991px) {
            .side-nav-box{
                display: none;
        }

    }
</style>
<div class="side-nav-main">
    <ul class="side-nav-items">

        <li>
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="rgb(255,255,255)"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81l5-4.5M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z"/></svg>
            <a href=" {{route('dashboard.user')}} ">Dashboard</a>
        </li>

        <li>
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="rgb(255,255,255)"><g><rect fill="none" height="24" width="24"/><g><path d="M19,5v14H5V5H19 M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3L19,3z"/></g><path d="M14,17H7v-2h7V17z M17,13H7v-2h10V13z M17,9H7V7h10V9z"/></g></svg>
            <a href="{{route('dashboard.user.article.index')}}">Your Articles</a>
        </li>

        <li>
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="rgb(255,255,255)"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5-8-5h16zm0 12H4V8l8 5 8-5v10z"/></svg>
            <a href="#">Followers</a>
        </li>

        <li>
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="rgb(255,255,255)"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z"/></svg>
            <a href="#">Notification</a>
        </li>

        <li class="my-5">
            <a href="{{route('dashboard.user.profile.show', Auth::user()->slug)}}" class="btn btn-success btn-sm"
                style="color:white">Your Profile</a>
        </li>
    </ul>
</div>

