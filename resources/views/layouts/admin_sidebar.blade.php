<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">{{ ' ' }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">{{ ' ' }}</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>
                    <span>{{ __('Dashboard') }}</span></a></li>
            <li class="{{ Route::is('admin.center.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin.center.index') }}"><i class="fas fa-file"></i>
                    <span>{{ __('Centers') }}</span></a></li>
            <li class="{{ Route::is('admin.category.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin.category.index') }}"><i class="fas fa-file"></i>
                    <span>{{ __('Categories') }}</span></a></li>
            <li class="{{ Route::is('admin.country.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin.country.index') }}"><i class="fas fa-file"></i>
                    <span>{{ __('Countries') }}</span></a></li>
            <li class="{{ Route::is('admin.city.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin.city.index') }}"><i class="fas fa-file"></i>
                    <span>{{ __('Cities') }}</span></a></li>
           <li class="{{ Route::is('admin.message.*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('admin.message.index') }}"><i class="fas fa-file"></i>
                        <span>{{ __('Messages') }}</span></a></li>
        </ul>
    </aside>
</div>
