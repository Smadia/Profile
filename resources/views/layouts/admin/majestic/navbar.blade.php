<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <a class="navbar-brand brand-logo" href=""><img src="{{ asset(custom('type icon')) }}" alt="logo"></a>
            <a class="navbar-brand brand-logo-mini" href=""><img src="{{ asset(custom('normal icon')) }}" alt="logo"></a>
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-sort-variant"></span>
            </button>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
            <li class="nav-item nav-search d-none d-lg-block w-100">
                <div class="input-group">
                    <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
                    </div>
                    <input id="search" type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
                </div>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    @if(!empty(Auth::user()->image))
                        <img src="{{ asset(Auth::user()->image) }}" alt="profile"/>
                    @else
                        <img src="{{ asset('img/etc/user.png') }}" alt="profile"/>
                    @endif
                    <span class="nav-profile-name">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item">
                        <i class="mdi mdi-settings text-primary"></i>
                        Settings
                    </a>
                    <a class="dropdown-item">
                        <i class="mdi mdi-logout text-primary"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>