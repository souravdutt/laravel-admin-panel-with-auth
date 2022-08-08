    <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle js-sidebar-toggle">
            <i class="hamburger align-self-center"></i>
        </a>

        <div class="navbar-collapse collapse">
            <ul class="navbar-nav navbar-align">
                <li class="nav-item dropdown">
                    <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                        <i class="align-middle" data-feather="settings"></i>
                    </a>

                    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                        {{-- <img src="{{ asset('img/avatars/avatar.jpg') }}" class="avatar img-fluid rounded me-1"
                            alt="Charles Hall" />  --}}
                            <span class="border border-dark rounded rounded-circle p-1"><i class="fa fa-user-tie fa-lg"></i></span>
                            <span class="text-dark">{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('user.profile') }}"><i class="align-middle me-1"
                                data-feather="user"></i> Profile</a>
                        <a class="dropdown-item" href="{{ route('user.changePassword') }}"><i class="align-middle me-1" data-feather="lock"></i>
                            Change Password</a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('user.logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Log out</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
