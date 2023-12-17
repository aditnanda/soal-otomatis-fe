<header class='mb-3'>
    <nav class="navbar navbar-expand navbar-light " style="background-color: #161A4D">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3" style="color: white"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto" style="display: block">

                    <a href="#">
                        <i class="icon-mid bi bi-bell mx-2" style="font-size: 22px;color:white;"></i><span class="counter counter-lg" style="color: white" id="count-notif">{{count($result ?? [])}}</span>&nbsp;&nbsp;
                    </a>

                </ul>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">


                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 " style="color: white">{{ $auth['name'] }}</h6>
                                <p class="mb-0 text-sm text-warning">Online</p>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar avatar-md">
                                    <img src="{{ 'https://ui-avatars.com/api/?name='.$auth['name'].'&color=7F9CF5&background=EBF4FF' }}">
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li>
                            <h6 class="dropdown-header">Hello, {{ strtok($auth['name'], " ") }}!</h6>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
