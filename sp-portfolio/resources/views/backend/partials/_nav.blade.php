<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav align-items-start">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <div class="custom_title">
                <p class="mb-0">{{ config('app.name', 'SP Portfolio') }}</p>
                <small class="mb-0 text-maroon"></small>
            </div>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle d-flex align-items-center justify-content-center" data-toggle="dropdown">
                <div class="d-flex flex-column align-items-center pr-2">
                    <span class="custom_font_size_sm d-none d-md-inline"></span>
                    <small class="custom_font_size_xs align-self-end"></small>
                </div>
                <img src="{{ asset('upload/profile_images/avater.jpg') }}" 
                     class="user-image img-circle elevation-2 m-0" 
                     alt="User Image"
                     width="40"
                     height="40" />
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <li class="user-header bg-primary">
                    <img src="{{ asset('upload/profile_images/avater.jpg') }}"
                         class="img-circle elevation-2"
                         alt="User Image"
                         width="100"
                         height="100" />
                </li>
                <li class="user-footer d-flex justify-content-between">
                    <div class="float-start">
                        <a href="{{ route('home') }}" class="btn btn-info rounded-0">Profile</a>
                    </div>
                    {{-- <div class="float-end">
                        <form action="{{ route('logout') }}" method="POST" id="logout_form">
                            @csrf
                            <button type="submit" class="btn btn-outline-warning rounded-0">
                                Log out
                            </button>
                        </form>
                    </div> --}}
                </li>
            </ul>
        </li>
    </ul>
</nav>
