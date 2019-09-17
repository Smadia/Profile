<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard.page') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @foreach(\App\Menu::all() as $menu)
            @if(Auth::user()->hasMenu($menu))
                <li class="nav-item">
                    <a class="nav-link" href="{{ (!Route::has('admin.'.$menu->route.'.page') ? '' : route('admin.'.$menu->route.'.page')) }}">
                        <i class="{{ $menu->icon }} menu-icon"></i>
                        <span class="menu-title">{{ $menu->name }}</span>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</nav>