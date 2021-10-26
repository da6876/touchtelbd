<div class="headerbar">

    <!-- LOGO -->
    <div class="headerbar-left">
        <a href="index.html" class="logo">
            {{--<img alt="Logo" src="assets/images/logos.jpg" /> --}}
             <span>TOUCHTEL BD</span>
        </a>
    </div>

    <nav class="navbar-custom">

        <ul class="list-inline float-right mb-0">


            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{asset('public/assets/images/avatars/admin.png')}}" alt="Profile image" class="avatar-rounded"> @if(Session::get('user_name')!="")
                        {{Session::get('user_name')}}
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->

                    <!-- item-->
                    <a href="pro-profile.html" class="dropdown-item notify-item">
                        <i class="fa fa-user"></i> <span>Profile</span>
                    </a>

                    <!-- item-->
                    <a href="{{url('Logout')}}" class="dropdown-item notify-item">
                        <i class="fa fa-power-off"></i> <span>Logout</span>
                    </a>

                </div>
            </li>
        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </li>
        </ul>

    </nav>

</div>
