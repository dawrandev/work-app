<div class="page-header">
    <div class="header-wrapper row m-0">
        <form class="form-inline search-full col" action="#" method="get">
            <div class="form-group w-100">
                <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative">
                        <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
                        <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                    </div>
                    <div class="Typeahead-menu"></div>
                </div>
            </div>
        </form>
        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="{{ asset('/assets/images/logo/logo.png') }}" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
        </div>
        <div class="left-header col horizontal-wrapper ps-0">

        </div>
        <div class="nav-right col-8 pull-right right-header p-0">
            <ul class="nav-menus">
                <li class="language-nav">
                    <div class="translate_wrapper">
                        <div class="current_lang">
                            <div class="lang">
                                <i class="flag-icon flag-icon-{{ app()->getlocale() }}"></i>
                                <span class="lang-txt">{{ app()->getlocale() }} </span>
                            </div>
                        </div>
                        <div class="more_lang">
                            <div class="lang {{ app()->getLocale() == 'ru' ? 'selected' : '' }}" data-value="ru">
                                <a href="{{ route('admin.dashboard', ['locale' => 'ru']) }}" class="lang-link">
                                    <i class="flag-icon flag-icon-ru"></i>
                                    <span class="lang-txt">Русский</span>
                                </a>
                            </div>

                            <div class="lang {{ app()->getLocale() == 'uz' ? 'selected' : '' }}" data-value="uz">
                                <a href="{{ route('admin.dashboard', ['locale' => 'uz']) }}" class="lang-link">
                                    <i class="flag-icon flag-icon-uz"></i>
                                    <span class="lang-txt">Oʻzbekcha</span>
                                </a>
                            </div>

                            <div class="lang {{ app()->getLocale() == 'kaa' ? 'selected' : '' }}" data-value="kr">
                                <a href="{{ route('admin.dashboard', ['locale' => 'kr']) }}" class="lang-link">
                                    <i class="flag-icon flag-icon-"></i>
                                    <span class="lang-txt">Qaraqalpaqsha</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="mode"><i class="fa fa-moon-o"></i></div>
                </li>
                <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
                <li class="profile-nav onhover-dropdown p-0 me-0">
                    <div class="media profile-media"><img class="b-r-10" src="{{ asset('/assets/images/dashboard/profile.jpg') }}" alt="">
                        <div class="media-body"><span>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                            <p class="mb-0 font-roboto">{{__('Admin')}}<i class="middle fa fa-angle-down"></i></p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li><a href="{{ route('admin.profile') }}"><i data-feather="user"></i><span>{{__('Profile')}}</span></a></li>
                        <li>
                            <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                                @csrf
                                <button type="submit" style="border: none; background: none; padding: 0; margin: 0; cursor: pointer;">
                                    <i data-feather="log-in"></i>
                                    <span>{{__('Logout')}}</span>
                                </button>
                            </form>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
        <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName"></div>
            </div>
            </div>
          </script>
        <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
    </div>
</div>