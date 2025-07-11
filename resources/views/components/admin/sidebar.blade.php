<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="{{ asset('assets/admin/images/logo/logo.png') }}" alt=""><img class="img-fluid for-dark" src="{{ asset('assets/admin/images/logo/logo_dark.png') }}" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="{{ asset('assets/admin/images/logo/logo-icon.png') }}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="index.html"><img class="img-fluid" src="{{ asset('assets/admin/images/logo/logo-icon.png') }}" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="users"></i><span>{{__('Users')}}</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('admin.users.index') }}">{{__('User List')}}</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="briefcase"></i><span>{{__('Jobs')}}</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('admin.jobs.index') }}">{{__('Job List')}}</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="box"></i><span>{{__('Category')}}</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('admin.categories.index') }}">{{__('Category List')}}</a></li>
                            <li><a href="{{ route('admin.categories.create') }}">{{__('Create Category')}}</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="package"></i><span>{{__('SubCategory')}}</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('admin.subcategories.index') }}">{{__('SubCategory List')}}</a></li>
                            <li><a href="{{ route('admin.subcategories.create') }}">{{__('Create SubCategory')}}</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="clock"></i><span>{{__('Type')}}</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('admin.types.index') }}">{{__('Types List')}}</a></li>
                            <li><a href="{{ route('admin.types.create') }}">{{__('Create Type')}}</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="briefcase"></i><span>{{__('Employment Type')}}</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('admin.employment-types.index') }}">{{__('Employment Types List')}}</a></li>
                            <li><a href="{{ route('admin.employment-types.create') }}">{{__('Create Employment Type')}}</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="map-pin"></i><span>{{__('District')}}</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('admin.districts.index') }}">{{__('Districts List')}}</a></li>
                            <li><a href="{{ route('admin.districts.create') }}">{{__('Create District')}}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>