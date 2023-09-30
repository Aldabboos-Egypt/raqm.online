<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <div class="brand flex-column-auto" id="kt_brand">
        <a href="{{route('dashboard.index')}}" class="brand-logo w3-display-container">
            <img alt="Logo" src="{{asset($setting->where('key','logo')->first()->val)}}" style="width: 80px;border-radius: 8px" />

        </a>
        <b class="w3-padding w3-large w3-display-topright w3-text-white">
            <b style="color: white" >{{ auth()->user('admin')->username }}</b>
        </b>
        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            <span class="svg-icon svg-icon svg-icon-xl">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                        <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                    </g>
                </svg>
            </span>
        </button>
    </div>
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
            <ul class="menu-nav">
                <li class="menu-item {{request()->routeIs('dashboard/home') || request()->routeIs('dashboard') ? 'menu-item-active' : ''}} " aria-haspopup="true">
                    <a href="{{route('dashboard/home')}}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/>
                                    <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"/>
                                </g>
                            </svg>
                        </span>
                        <span class="menu-text">{{trans('lang.home')}}</span>
                    </a>
                </li>
                @if(auth()->user('admin')->isAbleTo('read-general_site_meta_tags|read-general_site_slider|read-general_site_pointers|read-general_site_partners|read-general_site_services|read-general_site_about_us|read-general_site_reports_and_studies|read-general_site_job_counseling|read-general_site_events_and_news|read-general_site_users_guides|read-general_site_pages|read-general_site_common_questions|read-general_site_messages|read-general_site_news_letter|read-general_site_training_courses'))
                    <li class="menu-section">
                        <h4 class="menu-text">{{ trans('lang.general_side') }}</h4>
                        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                    </li>

                    <li class="menu-item menu-item-submenu {{request()->routeIs('dashboard.slider*') || request()->routeIs('dashboard.pointers*') || request()->routeIs('dashboard.partners*') || request()->routeIs('dashboard.services*') || request()->routeIs('dashboard.reports')  || request()->routeIs('dashboard.job_counseling*') || request()->routeIs('dashboard.event_and_news*') || request()->routeIs('dashboard.user_guides*') ||  request()->routeIs('dashboard.pages*') || request()->routeIs('dashboard.main_pages*') || request()->routeIs('dashboard.messages*') || request()->routeIs('dashboard.about_us*') || request()->routeIs('dashboard.faq*')  || request()->routeIs('dashboard.news_letter*')  ? 'menu-item-open menu-item-here' : ''}} " aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{route('dashboard/home')}}" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Layers.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"></path>
                                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg>
                        </span>
                            <span class="menu-text">{{trans('lang.general_site')}}</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">

                            </ul>
                        </div>
                    </li>
                @endif

                @if(auth()->user('admin')->isAbleTo('read-employees|read-roles|read-supervisors|read-universities|read-degrees'))
                    <li class="menu-section">
                        <h4 class="menu-text">{{ trans('lang.employees') }}</h4>
                        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                    </li>

                    @if(auth()->user('admin')->isAbleTo('read-roles'))
                        <li class="menu-item {{ request()->routeIs('dashboard.roles*') || request()->routeIs('dashboard.get-admins-by-rule') || request()->routeIs('dashboard.create-admins-by-rule') || request()->routeIs('dashboard.edit-admins-by-rule') ? 'menu-item-active' : ''}} " aria-haspopup="true">
                            <a href="{{route('dashboard.roles')}}" class="menu-link">
                                <span class="svg-icon menu-icon">
                                    <span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-03-11-144509/theme/html/demo1/dist/../src/media/svg/icons/Communication/Group.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg><!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="menu-text">{{trans('lang.roles')}}</span>
                            </a>
                        </li>
                    @endif

                    @if(auth()->user('admin')->isAbleTo('read-employees'))
                        <li class="menu-item {{request()->routeIs('dashboard.admins*') ? 'menu-item-active' : ''}} " aria-haspopup="true">
                            <a href="{{route('dashboard.admins')}}" class="menu-link">
                                <span class="svg-icon menu-icon">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-text">{{trans('lang.employees')}}</span>
                            </a>
                        </li>
                    @endif

                    @if(auth()->user('admin')->isAbleTo('read-supervisors'))
                        <li class="menu-item {{request()->routeIs('dashboard.supervisors*') || request()->routeIs('dashboard.get-member-by-supervisor') ? 'menu-item-active' : ''}} " aria-haspopup="true">
                            <a href="{{route('dashboard.supervisors')}}" class="menu-link">
                                <span class="svg-icon menu-icon">
                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-03-11-144509/theme/html/demo1/dist/../src/media/svg/icons/General/User.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg><!--end::Svg Icon-->
                                </span>
                                <span class="menu-text">{{trans('lang.supervisors')}}</span>
                            </a>
                        </li>
                    @endif

                    @if(auth()->user('admin')->isAbleTo('read-trainers'))
                        <li class="menu-item {{request()->routeIs('dashboard.trainers*')? 'menu-item-active' : ''}} " aria-haspopup="true">
                            <a href="{{route('dashboard.trainers')}}" class="menu-link">
                                <span class="svg-icon menu-icon">
                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-03-11-144509/theme/html/demo1/dist/../src/media/svg/icons/General/User.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg><!--end::Svg Icon-->
                                </span>
                                <span class="menu-text">{{trans('lang.trainers')}}</span>
                            </a>
                        </li>
                    @endif

                    @if(auth()->user('admin')->isAbleTo('read-ebook'))
                        <li class="menu-item {{request()->routeIs('dashboard.ebook*')? 'menu-item-active' : ''}} " aria-haspopup="true">
                            <a href="{{route('dashboard.ebook')}}" class="menu-link">
                                <span class="svg-icon menu-icon">
                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-03-11-144509/theme/html/demo1/dist/../src/media/svg/icons/General/User.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg><!--end::Svg Icon-->
                                </span>
                                <span class="menu-text">{{trans('lang.ebook')}}</span>
                            </a>
                        </li>
                    @endif

                @if(auth()->user('admin')->isAbleTo('read-faculty_of_member'))
                    <li class="menu-section">
                        <h4 class="menu-text">{{ trans('lang.faculty_of_member') }}</h4>
                        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                    </li>

                        @if(auth()->user('admin')->isAbleTo('read-universities'))
                            <li class="menu-item {{request()->routeIs('dashboard.universities*') || request()->routeIs('dashboard.get-member-by-university') ? 'menu-item-active' : ''}} " aria-haspopup="true">
                                <a href="{{route('dashboard.universities')}}" class="menu-link">
                                <span class="svg-icon menu-icon">
                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-03-11-144509/theme/html/demo1/dist/../src/media/svg/icons/Home/Building.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z" fill="#000000"/>
                                            <rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1"/>
                                            <path d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg><!--end::Svg Icon-->
                                </span>
                                    <span class="menu-text">{{trans('lang.universities')}}</span>
                                </a>
                            </li>
                        @endif

                        @if(auth()->user('admin')->isAbleTo('read-tracks'))
                            <li class="menu-item {{request()->routeIs('dashboard.tracks*') ? 'menu-item-active' : ''}} " aria-haspopup="true">
                                <a href="{{route('dashboard.tracks')}}" class="menu-link">
                                     <span class="svg-icon menu-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M9,10 L9,19 L5,19 L5,10 L5,6 L18,6 L18,10 L9,10 Z" fill="#000000" transform="translate(11.500000, 12.500000) scale(-1, 1) translate(-11.500000, -12.500000) "/>
                                                <circle fill="#000000" opacity="0.3" cx="8" cy="16" r="2"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="menu-text">{{trans('lang.tracks')}}</span>
                                </a>
                            </li>
                        @endif

                        @if(auth()->user('admin')->isAbleTo('read-degrees'))
                            <li class="menu-item {{request()->routeIs('dashboard.degrees*') || request()->routeIs('dashboard.scores*') ? 'menu-item-active' : ''}} " aria-haspopup="true">
                                <a href="{{route('dashboard.degrees')}}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M12.7442084,3.27882877 L19.2473374,6.9949025 C19.7146999,7.26196679 20.003129,7.75898194 20.003129,8.29726722 L20.003129,15.7027328 C20.003129,16.2410181 19.7146999,16.7380332 19.2473374,17.0050975 L12.7442084,20.7211712 C12.2830594,20.9846849 11.7169406,20.9846849 11.2557916,20.7211712 L4.75266256,17.0050975 C4.28530007,16.7380332 3.99687097,16.2410181 3.99687097,15.7027328 L3.99687097,8.29726722 C3.99687097,7.75898194 4.28530007,7.26196679 4.75266256,6.9949025 L11.2557916,3.27882877 C11.7169406,3.01531506 12.2830594,3.01531506 12.7442084,3.27882877 Z M12,14.5 C13.3807119,14.5 14.5,13.3807119 14.5,12 C14.5,10.6192881 13.3807119,9.5 12,9.5 C10.6192881,9.5 9.5,10.6192881 9.5,12 C9.5,13.3807119 10.6192881,14.5 12,14.5 Z" fill="#000000"/>
                                    </g>
                                </svg><!--end::Svg Icon-->
                            </span>
                                    <span class="menu-text">{{trans('lang.degrees')}}</span>
                                </a>
                            </li>
                        @endif

                    @endif

                    @if(auth()->user('admin')->isAbleTo('read-faculty_of_member'))
                        <li class="menu-item {{request()->routeIs('dashboard.faculty_member*') || in_array('cv', request()->segments()) ? 'menu-item-active' : ''}} " aria-haspopup="true">
                            <a href="{{route('dashboard.faculty_member')}}" class="menu-link">
                                <span class="svg-icon menu-icon">
                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-03-11-144509/theme/html/demo1/dist/../src/media/svg/icons/Home/Building.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg><!--end::Svg Icon-->
                                </span>
                                <span class="menu-text">{{trans('lang.faculty_of_member')}}</span>
                            </a>
                        </li>
                    @endif
                    @if(auth()->user('admin')->isAbleTo('read-skill_test'))
                        <li class="menu-item {{request()->routeIs('dashboard.skill_test*') || request()->routeIs('dashboard.questions*') || request()->routeIs('dashboard.nomination_courses*') ? 'menu-item-active' : '' }} " aria-haspopup="true">
                            <a href="{{route('dashboard.skill_test')}}" class="menu-link">
                                <span class="svg-icon menu-icon">
                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Layout/Layout-grid.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="#000000" opacity="0.3" x="4" y="4" width="4" height="4" rx="1"/>
                                            <path d="M5,10 L7,10 C7.55228475,10 8,10.4477153 8,11 L8,13 C8,13.5522847 7.55228475,14 7,14 L5,14 C4.44771525,14 4,13.5522847 4,13 L4,11 C4,10.4477153 4.44771525,10 5,10 Z M11,4 L13,4 C13.5522847,4 14,4.44771525 14,5 L14,7 C14,7.55228475 13.5522847,8 13,8 L11,8 C10.4477153,8 10,7.55228475 10,7 L10,5 C10,4.44771525 10.4477153,4 11,4 Z M11,10 L13,10 C13.5522847,10 14,10.4477153 14,11 L14,13 C14,13.5522847 13.5522847,14 13,14 L11,14 C10.4477153,14 10,13.5522847 10,13 L10,11 C10,10.4477153 10.4477153,10 11,10 Z M17,4 L19,4 C19.5522847,4 20,4.44771525 20,5 L20,7 C20,7.55228475 19.5522847,8 19,8 L17,8 C16.4477153,8 16,7.55228475 16,7 L16,5 C16,4.44771525 16.4477153,4 17,4 Z M17,10 L19,10 C19.5522847,10 20,10.4477153 20,11 L20,13 C20,13.5522847 19.5522847,14 19,14 L17,14 C16.4477153,14 16,13.5522847 16,13 L16,11 C16,10.4477153 16.4477153,10 17,10 Z M5,16 L7,16 C7.55228475,16 8,16.4477153 8,17 L8,19 C8,19.5522847 7.55228475,20 7,20 L5,20 C4.44771525,20 4,19.5522847 4,19 L4,17 C4,16.4477153 4.44771525,16 5,16 Z M11,16 L13,16 C13.5522847,16 14,16.4477153 14,17 L14,19 C14,19.5522847 13.5522847,20 13,20 L11,20 C10.4477153,20 10,19.5522847 10,19 L10,17 C10,16.4477153 10.4477153,16 11,16 Z M17,16 L19,16 C19.5522847,16 20,16.4477153 20,17 L20,19 C20,19.5522847 19.5522847,20 19,20 L17,20 C16.4477153,20 16,19.5522847 16,19 L16,17 C16,16.4477153 16.4477153,16 17,16 Z" fill="#000000"/>
                                        </g>
                                    </svg>
                                </span>
                                <span class="menu-text">{{trans('lang.skill_test')}}</span>
                            </a>
                        </li>
                    @endif
                @endif

                <!-- Start Courses -->

                <li class="menu-item menu-item-submenu {{request()->routeIs('dashboard.training_courses*') ? 'menu-item-open menu-item-here' : ''}} " aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Layout/Layout-top-panel-1.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <rect fill="#000000" x="2" y="4" width="19" height="4" rx="1"/>
                                    <path d="M3,10 L6,10 C6.55228475,10 7,10.4477153 7,11 L7,19 C7,19.5522847 6.55228475,20 6,20 L3,20 C2.44771525,20 2,19.5522847 2,19 L2,11 C2,10.4477153 2.44771525,10 3,10 Z M10,10 L13,10 C13.5522847,10 14,10.4477153 14,11 L14,19 C14,19.5522847 13.5522847,20 13,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M17,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,19 C21,19.5522847 20.5522847,20 20,20 L17,20 C16.4477153,20 16,19.5522847 16,19 L16,11 C16,10.4477153 16.4477153,10 17,10 Z" fill="#000000" opacity="0.3"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">{{trans('lang.training_courses')}}</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            @if(auth()->user('admin')->isAbleTo('read-training_courses'))
                                <li class="menu-item {{request()->routeIs('dashboard.training_courses.index_simultaneous') || request()->routeIs('dashboard.training_courses.create_simultaneous') || request()->routeIs('dashboard.training_courses.edit_simultaneous') || request()->routeIs('dashboard.training_courses.show_simultaneous') || request()->routeIs('dashboard.training_courses.general_exam.simultaneous_courses*') ? 'menu-item-active' : ''}}" aria-haspopup="true">
                                    <a href="{{route('dashboard.training_courses.index_simultaneous')}}" class="menu-link ">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">{{__('lang.simultaneous_courses')}}</span>
                                    </a>
                                </li>
                            @endif
                            @if(auth()->user('admin')->isAbleTo('read-training_courses'))
                                <li class="menu-item {{request()->routeIs('dashboard.training_courses.index_asynchronous_courses') || request()->routeIs('dashboard.training_courses.create_asynchronous_courses') || request()->routeIs('dashboard.training_courses.edit_asynchronous_courses') || request()->routeIs('dashboard.training_courses.show_asynchronous_courses') || request()->routeIs('dashboard.training_courses.sessions') || request()->routeIs('dashboard.training_courses.sessions.show') || request()->routeIs('dashboard.training_courses.sessions.create') || request()->routeIs('dashboard.training_courses.sessions.edit') || request()->routeIs('dashboard.training_courses.session_test*') || request()->routeIs('dashboard.training_courses.question_session_test*') || request()->routeIs('dashboard.training_courses.general_exam') || request()->routeIs('dashboard.training_courses.general_exam.create') || request()->routeIs('dashboard.training_courses.general_exam.select_questions')  || request()->routeIs('dashboard.training_courses.edit') || request()->routeIs('dashboard.training_courses.general_exam.show') || request()->routeIs('dashboard.training_courses.general_exam.edit') ? 'menu-item-active' : ''}}" aria-haspopup="true">
                                    <a href="{{route('dashboard.training_courses.index_asynchronous_courses')}}" class="menu-link ">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">{{__('lang.asynchronous_courses')}}</span>
                                    </a>
                                </li>
                            @endif
                            @if(auth()->user('admin')->isAbleTo('read-training_courses'))
                                <li class="menu-item {{request()->routeIs('dashboard.training_courses.index_live_training_courses') || request()->routeIs('dashboard.training_courses.create_live_training_courses') || request()->routeIs('dashboard.training_courses.edit_live_training_courses') || request()->routeIs('dashboard.training_courses.show_live_training_courses') || request()->routeIs('dashboard.training_courses.general_exam.live_courses*') ? 'menu-item-active' : ''}}" aria-haspopup="true">
                                    <a href="{{route('dashboard.training_courses.index_live_training_courses')}}" class="menu-link ">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">{{__('lang.live_training_courses')}}</span>
                                    </a>
                                </li>
                            @endif
                            @if(auth()->user('admin')->isAbleTo('read-training_courses'))
                                <li class="menu-item {{request()->routeIs('dashboard.training_courses.index_workshops_training_events') || request()->routeIs('dashboard.training_courses.create_workshops_training_events') || request()->routeIs('dashboard.training_courses.edit_workshops_training_events') || request()->routeIs('dashboard.training_courses.show_workshops_training_events') || request()->routeIs('dashboard.training_courses.general_exam.workshop_courses*') ? 'menu-item-active' : ''}}" aria-haspopup="true">
                                    <a href="{{route('dashboard.training_courses.index_workshops_training_events')}}" class="menu-link ">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">{{__('lang.Workshops_training_events')}}</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>

                <!-- End Courses -->


                <!-- Start Reports -->

                <li class="menu-item menu-item-submenu {{request()->routeIs('dashboard.reports*') ? 'menu-item-open menu-item-here' : ''}} " aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Layout/Layout-top-panel-1.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <rect fill="#000000" x="2" y="4" width="19" height="4" rx="1"/>
                                    <path d="M3,10 L6,10 C6.55228475,10 7,10.4477153 7,11 L7,19 C7,19.5522847 6.55228475,20 6,20 L3,20 C2.44771525,20 2,19.5522847 2,19 L2,11 C2,10.4477153 2.44771525,10 3,10 Z M10,10 L13,10 C13.5522847,10 14,10.4477153 14,11 L14,19 C14,19.5522847 13.5522847,20 13,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M17,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,19 C21,19.5522847 20.5522847,20 20,20 L17,20 C16.4477153,20 16,19.5522847 16,19 L16,11 C16,10.4477153 16.4477153,10 17,10 Z" fill="#000000" opacity="0.3"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">{{trans('lang.reports')}}</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            @if(auth()->user('admin')->isAbleTo('tracks-report'))
                                <li class="menu-item {{request()->routeIs('dashboard.reports.tracks*') ? 'menu-item-active' : ''}}" aria-haspopup="true">
                                    <a href="{{route('dashboard.reports.tracks')}}" class="menu-link ">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">{{__('lang.track_reports')}}</span>
                                    </a>
                                </li>
                            @endif
                            @if(auth()->user('admin')->isAbleTo('users-report'))
                                <li class="menu-item {{request()->routeIs('dashboard.reports.users*') ? 'menu-item-active' : ''}}" aria-haspopup="true">
                                    <a href="{{route('dashboard.reports.users')}}" class="menu-link ">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">{{__('lang.users_report')}}</span>
                                    </a>
                                </li>
                            @endif
                            @if(auth()->user('admin')->isAbleTo('universities-report'))
                                <li class="menu-item {{request()->routeIs('dashboard.reports.universities*') ? 'menu-item-active' : ''}}" aria-haspopup="true">
                                    <a href="{{route('dashboard.reports.universities')}}" class="menu-link ">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">{{__('lang.universities_reports')}}</span>
                                    </a>
                                </li>
                            @endif
                            @if(auth()->user('admin')->isAbleTo('trainers-report'))
                                <li class="menu-item {{request()->routeIs('dashboard.reports.trainers*') ? 'menu-item-active' : ''}}" aria-haspopup="true">
                                    <a href="{{route('dashboard.reports.trainers')}}" class="menu-link ">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">{{__('lang.trainers_report')}}</span>
                                    </a>
                                </li>
                            @endif
                            @if(auth()->user('admin')->isAbleTo('degrees-report'))
                                <li class="menu-item {{request()->routeIs('dashboard.reports.degrees*') ? 'menu-item-active' : ''}}" aria-haspopup="true">
                                    <a href="{{route('dashboard.reports.degrees')}}" class="menu-link ">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">{{__('lang.degrees_reports')}}</span>
                                    </a>
                                </li>
                            @endif
                            @if(auth()->user('admin')->isAbleTo('summary-report'))
                                <li class="menu-item {{request()->routeIs('dashboard.reports.summary*') ? 'menu-item-active' : ''}}" aria-haspopup="true">
                                    <a href="{{route('dashboard.reports.summary')}}" class="menu-link ">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">{{__('lang.summary_reports')}}</span>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </li>

                <!-- End Courses -->


                @if(auth()->user('admin')->isAbleTo('read-setting'))
                    <li class="menu-section">
                        <h4 class="menu-text">{{ trans('lang.settings') }}</h4>
                        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                    </li>


                    <li class="menu-item {{request()->routeIs('setting*') ? 'menu-item-active' : ''}} " aria-haspopup="true">
                        <a href="{{route('setting')}}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M18.6225,9.75 L18.75,9.75 C19.9926407,9.75 21,10.7573593 21,12 C21,13.2426407 19.9926407,14.25 18.75,14.25 L18.6854912,14.249994 C18.4911876,14.250769 18.3158978,14.366855 18.2393549,14.5454486 C18.1556809,14.7351461 18.1942911,14.948087 18.3278301,15.0846699 L18.372535,15.129375 C18.7950334,15.5514036 19.03243,16.1240792 19.03243,16.72125 C19.03243,17.3184208 18.7950334,17.8910964 18.373125,18.312535 C17.9510964,18.7350334 17.3784208,18.97243 16.78125,18.97243 C16.1840792,18.97243 15.6114036,18.7350334 15.1896699,18.3128301 L15.1505513,18.2736469 C15.008087,18.1342911 14.7951461,18.0956809 14.6054486,18.1793549 C14.426855,18.2558978 14.310769,18.4311876 14.31,18.6225 L14.31,18.75 C14.31,19.9926407 13.3026407,21 12.06,21 C10.8173593,21 9.81,19.9926407 9.81,18.75 C9.80552409,18.4999185 9.67898539,18.3229986 9.44717599,18.2361469 C9.26485393,18.1556809 9.05191298,18.1942911 8.91533009,18.3278301 L8.870625,18.372535 C8.44859642,18.7950334 7.87592081,19.03243 7.27875,19.03243 C6.68157919,19.03243 6.10890358,18.7950334 5.68746499,18.373125 C5.26496665,17.9510964 5.02757002,17.3784208 5.02757002,16.78125 C5.02757002,16.1840792 5.26496665,15.6114036 5.68716991,15.1896699 L5.72635306,15.1505513 C5.86570889,15.008087 5.90431906,14.7951461 5.82064513,14.6054486 C5.74410223,14.426855 5.56881236,14.310769 5.3775,14.31 L5.25,14.31 C4.00735931,14.31 3,13.3026407 3,12.06 C3,10.8173593 4.00735931,9.81 5.25,9.81 C5.50008154,9.80552409 5.67700139,9.67898539 5.76385306,9.44717599 C5.84431906,9.26485393 5.80570889,9.05191298 5.67216991,8.91533009 L5.62746499,8.870625 C5.20496665,8.44859642 4.96757002,7.87592081 4.96757002,7.27875 C4.96757002,6.68157919 5.20496665,6.10890358 5.626875,5.68746499 C6.04890358,5.26496665 6.62157919,5.02757002 7.21875,5.02757002 C7.81592081,5.02757002 8.38859642,5.26496665 8.81033009,5.68716991 L8.84944872,5.72635306 C8.99191298,5.86570889 9.20485393,5.90431906 9.38717599,5.82385306 L9.49484664,5.80114977 C9.65041313,5.71688974 9.7492905,5.55401473 9.75,5.3775 L9.75,5.25 C9.75,4.00735931 10.7573593,3 12,3 C13.2426407,3 14.25,4.00735931 14.25,5.25 L14.249994,5.31450877 C14.250769,5.50881236 14.366855,5.68410223 14.552824,5.76385306 C14.7351461,5.84431906 14.948087,5.80570889 15.0846699,5.67216991 L15.129375,5.62746499 C15.5514036,5.20496665 16.1240792,4.96757002 16.72125,4.96757002 C17.3184208,4.96757002 17.8910964,5.20496665 18.312535,5.626875 C18.7350334,6.04890358 18.97243,6.62157919 18.97243,7.21875 C18.97243,7.81592081 18.7350334,8.38859642 18.3128301,8.81033009 L18.2736469,8.84944872 C18.1342911,8.99191298 18.0956809,9.20485393 18.1761469,9.38717599 L18.1988502,9.49484664 C18.2831103,9.65041313 18.4459853,9.7492905 18.6225,9.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path d="M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
                                    </g>
                                </svg><!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">{{trans('lang.settings')}}</span>
                        </a>
                    </li>
                @endif

            </ul>
            <!--end::Menu Nav-->
        </div>
        <!--end::Menu Container-->
    </div>
    <!--end::Aside Menu-->
</div>
<!--end::Aside-->
