<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="{{ route('admin.dashboard') }}">
                <img class="img-fluid for-light" src="{{ asset('assets/admin/images/logo/logo.png') }}" alt="">
                <img class="img-fluid for-dark" src="{{ asset('assets/admin/images/logo/logo_dark.png') }}" alt="">
            </a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar">
                <i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i>
            </div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="{{ route('admin.dashboard') }}">
                <img class="img-fluid" src="{{ asset('assets/admin/images/logo/logo-icon.png') }}" alt="">
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    {{-- Dashboard --}}
                    <li class="sidebar-list {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="#">
                            <i data-feather="monitor"></i><span>{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.dashboard') }}"><i data-feather="monitor"> </i><span>{{__('Dashboard') }}</span></a></li>
                    {{-- Users --}}
                    <li class="sidebar-list {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="#">
                            <i data-feather="users"></i><span>{{ __('Users') }}</span>
                        </a>
                        <ul class="sidebar-submenu" style="{{ request()->routeIs('admin.users.*') ? 'display: block;' : '' }}">
                            <li><a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.index') ? 'active' : '' }}">{{ __('User List') }}</a></li>
                        </ul>
                    </li>

                    {{-- Jobs --}}
                    <li class="sidebar-list {{ request()->routeIs('admin.jobs.*') ? 'active' : '' }}">
                        <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.jobs.*') ? 'active' : '' }}" href="#">
                            <i data-feather="briefcase"></i><span>{{ __('Jobs') }}</span>
                        </a>
                        <ul class="sidebar-submenu" style="{{ request()->routeIs('admin.jobs.*') ? 'display: block;' : '' }}">
                            <li><a href="{{ route('admin.jobs.index') }}" class="{{ request()->routeIs('admin.jobs.index') ? 'active' : '' }}">{{ __('Job List') }}</a></li>
                        </ul>
                    </li>

                    {{-- Offers --}}
                    <li class="sidebar-list {{ request()->routeIs('admin.offers.*') ? 'active' : '' }}">
                        <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.offers.*') ? 'active' : '' }}" href="#">
                            <i data-feather="clipboard"></i><span>{{ __('Offers') }}</span>
                        </a>
                        <ul class="sidebar-submenu" style="{{ request()->routeIs('admin.offers.*') ? 'display: block;' : '' }}">
                            <li><a href="{{ route('admin.offers.index') }}" class="{{ request()->routeIs('admin.offers.index') ? 'active' : '' }}">{{ __('Offer List') }}</a></li>
                        </ul>
                    </li>

                    {{-- Category --}}
                    <li class="sidebar-list {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" href="#">
                            <i data-feather="box"></i><span>{{ __('Category') }}</span>
                        </a>
                        <ul class="sidebar-submenu" style="{{ request()->routeIs('admin.categories.*') ? 'display: block;' : '' }}">
                            <li><a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.index') ? 'active' : '' }}">{{ __('Category List') }}</a></li>
                            <li><a href="{{ route('admin.categories.create') }}" class="{{ request()->routeIs('admin.categories.create') ? 'active' : '' }}">{{ __('Create Category') }}</a></li>
                        </ul>
                    </li>

                    {{-- SubCategory --}}
                    <li class="sidebar-list {{ request()->routeIs('admin.subcategories.*') ? 'active' : '' }}">
                        <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.subcategories.*') ? 'active' : '' }}" href="#">
                            <i data-feather="package"></i><span>{{ __('SubCategory') }}</span>
                        </a>
                        <ul class="sidebar-submenu" style="{{ request()->routeIs('admin.subcategories.*') ? 'display: block;' : '' }}">
                            <li><a href="{{ route('admin.subcategories.index') }}" class="{{ request()->routeIs('admin.subcategories.index') ? 'active' : '' }}">{{ __('SubCategory List') }}</a></li>
                            <li><a href="{{ route('admin.subcategories.create') }}" class="{{ request()->routeIs('admin.subcategories.create') ? 'active' : '' }}">{{ __('Create SubCategory') }}</a></li>
                        </ul>
                    </li>

                    {{-- Type --}}
                    <li class="sidebar-list {{ request()->routeIs('admin.types.*') ? 'active' : '' }}">
                        <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.types.*') ? 'active' : '' }}" href="#">
                            <i data-feather="clock"></i><span>{{ __('Type') }}</span>
                        </a>
                        <ul class="sidebar-submenu" style="{{ request()->routeIs('admin.types.*') ? 'display: block;' : '' }}">
                            <li><a href="{{ route('admin.types.index') }}" class="{{ request()->routeIs('admin.types.index') ? 'active' : '' }}">{{ __('Types List') }}</a></li>
                            <li><a href="{{ route('admin.types.create') }}" class="{{ request()->routeIs('admin.types.create') ? 'active' : '' }}">{{ __('Create Type') }}</a></li>
                        </ul>
                    </li>

                    {{-- Employment Type --}}
                    <li class="sidebar-list {{ request()->routeIs('admin.employment-types.*') ? 'active' : '' }}">
                        <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.employment-types.*') ? 'active' : '' }}" href="#">
                            <i data-feather="briefcase"></i><span>{{ __('Employment Type') }}</span>
                        </a>
                        <ul class="sidebar-submenu" style="{{ request()->routeIs('admin.employment-types.*') ? 'display: block;' : '' }}">
                            <li><a href="{{ route('admin.employment-types.index') }}" class="{{ request()->routeIs('admin.employment-types.index') ? 'active' : '' }}">{{ __('Employment Types List') }}</a></li>
                            <li><a href="{{ route('admin.employment-types.create') }}" class="{{ request()->routeIs('admin.employment-types.create') ? 'active' : '' }}">{{ __('Create Employment Type') }}</a></li>
                        </ul>
                    </li>

                    {{-- District --}}
                    <li class="sidebar-list {{ request()->routeIs('admin.districts.*') ? 'active' : '' }}">
                        <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.districts.*') ? 'active' : '' }}" href="#">
                            <i data-feather="map-pin"></i><span>{{ __('District') }}</span>
                        </a>
                        <ul class="sidebar-submenu" style="{{ request()->routeIs('admin.districts.*') ? 'display: block;' : '' }}">
                            <li><a href="{{ route('admin.districts.index') }}" class="{{ request()->routeIs('admin.districts.index') ? 'active' : '' }}">{{ __('Districts List') }}</a></li>
                            <li><a href="{{ route('admin.districts.create') }}" class="{{ request()->routeIs('admin.districts.create') ? 'active' : '' }}">{{ __('Create District') }}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>