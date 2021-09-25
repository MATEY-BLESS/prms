<style>
    #headNav{
        /* display: none; */
    }

    .user-name{
        cursor: pointer;
    }

    .logout-popup{
        width: 150px;
        background-color: whitesmoke;
        min-height: 150px;
        position: absolute;
        margin-top: 25px;
        display: none;
        /* padding: 15px; */
        margin-right: 15px;
        right: 0;
    }

    .logout-others a{
        text-decoration: none;
        color: rgb(48, 48, 95);
    }

    .logout-others .div{
        padding-left: 20px;
        padding-top: 10px;
    }
    .logout-others .div:hover{
        background-color: #ebe8e8;
        width: 100%;
    }


    .logout-div{
        border-top:0.5px solid #e4e3e3;
        width: 100%;
        height: 30px;
        padding-left: 15px;
        bottom: 0;
        position: absolute;

    }

    /* MEDIA QUERIES */
    @media (min-width: 1400px) {

    }
</style>


<header class="p-3 dashboard-top-nav testing" id="headNav">
    <div class="d-flex justify-content-between" style="color: rgb(48, 48, 95); font-weight: bold;">
        <div style="width: ;">
            <span>{{config('app.name')}}</span>
        </div>

        <div class="d-flex">
            <span class="user-name" >{{Auth::user()->name }} </span>

            {{-- logout popup menu --}}
            <div class="logout-popup" >
                <div class="logout-others">
                    <div class="div">
                        <a href="{{route('dashboard.admin.profile')}}">Profile</a>
                    </div>

                    <div class="div">
                        <a href="#">Activity</a>
                    </div>

                    <div class="div">
                        <a href="#">De-activate</a>
                    </div>
                </div>


                <div class="logout-div">
                    <!--Logout Authentication -->
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button onclick="event.preventDefault(); this.closest('form').submit();"
                            style="border-style: none; background-color: whitesmoke;">{{ __('Log Out') }}</button>
                    </form>
                </div>

            </div>


        </div>

    </div>
</header>


@section('script')
<script>
    'use strict'

    const logoutPopup = document.querySelector(".logout-popup");
    const userName = document.querySelector(".user-name");

    userName.addEventListener("mouseover", ()=>{
        logoutPopup.style.display = "block";

    })

    logoutPopup.addEventListener("mouseleave", ()=>{
        logoutPopup.style.display = "none";
    })

    document.addEventListener("click", ()=>{
        logoutPopup.style.display = "none";
    })

</script>

@endsection
