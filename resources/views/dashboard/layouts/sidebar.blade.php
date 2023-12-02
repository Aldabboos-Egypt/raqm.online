<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper"><a href="#" data-bs-original-title="" title="">
                <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid img-50 for-light" src="#"
                    alt="">
                <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid img-50 for-dark" src="#"
                    alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar" checked="checked">
            </div>
        </div>
        <div class="logo-icon-wrapper"><a href="#" data-bs-original-title="" title="">
                <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid img-30" src="#"
                    alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow disabled" id="left-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar" data-simplebar="init" style="display: block;">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                                    <div class="simplebar-content" style="padding: 0px;">
                                        <li class="back-btn"><a href="#" class="active" data-bs-original-title=""
                                                title=""><img class="img-fluid" src="#" alt=""></a>
                                            <div class="mobile-back text-end"><span>Back</span>
                                            </div>
                                        </li>

                                        @permission('read-dashboard')
                                            <li class="sidebar-list">
                                                <a class="sidebar-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}"
                                                    href="{{ route('dashboard.index') }}">
                                                    <span data-feather="home" class="text-muted"></span>
                                                    <span class="">{{ __('lang.dashboard') }}</span>
                                                </a>
                                            </li>
                                        @endpermission

                                        {{-- Clinics --}}
                                        {{-- <li class="sidebar-list ">
                                            <a class="sidebar-link sidebar-title {{ request()->routeIs('dashboard.roles.index') || request()->routeIs('dashboard.admins.index') ? 'active' : '' }}"
                                                href="#" data-bs-original-title="" title="">
                                                <i class="fa fa-cogs text-muted me-3"></i>
                                                <span class="">{{ __('Clinics') }}</span>
                                                <div class="according-menu"></div>
                                            </a>
                                            <ul class="sidebar-submenu" style="display: block;">
                                                <li>
                                                    <a class="{{ request()->routeIs('dashboard.clinics.index') ? 'active' : '' }}"
                                                         href="{{ route('dashboard.clinics.index') }}" data-bs-original-title=""
                                                        title="">{{ __('Clinics List') }}
                                                    </a>
                                                </li>

                                            </ul>
                                        </li> --}}

                                        {{-- Categories --}}
                                        @permission('read-category')
                                            <li class="sidebar-list ">
                                                <a class="sidebar-link {{ request()->routeIs('dashboard.categories.index') ? 'active' : '' }}"
                                                    href="{{ route('dashboard.categories.index') }}">
                                                    <svg class="stroke-icon">
                                                        <use
                                                            href="{{ url('/') }}/assets/svg/icon-sprite.svg#stroke-learning">
                                                        </use>
                                                    </svg>
                                                    <span class="">{{ __('lang.categories') }}</span>
                                                </a>
                                            </li>
                                        @endpermission

                                        {{-- Clinics --}}
                                        @permission('read-clinic')
                                            <li class="sidebar-list ">
                                                <a class="sidebar-link {{ request()->routeIs('dashboard.clinics.*') ? 'active' : '' }}"
                                                    href="{{ route('dashboard.clinics.index') }}">
                                                    <svg class="stroke-icon">
                                                        <use
                                                            href="{{ url('/') }}/assets/svg/icon-sprite.svg#stroke-table">
                                                        </use>
                                                    </svg>
                                                    <span class="">{{ __('lang.clinics') }}</span>
                                                </a>
                                            </li>
                                        @endpermission

                                        {{-- Clinics --}}
                                        @permission('read-clinic_requests')
                                            <li class="sidebar-list ">
                                                <a class="sidebar-link {{ request()->routeIs('dashboard.clinic_requests.*') ? 'active' : '' }}"
                                                    href="{{ route('dashboard.clinic_requests.index') }}">
                                                    <svg class="stroke-icon">
                                                        <use
                                                            href="{{ url('/') }}/assets/svg/icon-sprite.svg#stroke-table">
                                                        </use>
                                                    </svg>
                                                    <span class="">{{ __('lang.clinic_requests') }}</span>
                                                </a>
                                            </li>
                                        @endpermission

                                        {{-- Clinics --}}
                                        @permission('read-clinic_comments')
                                            <li class="sidebar-list ">
                                                <a class="sidebar-link {{ request()->routeIs('dashboard.clinic_comments.*') ? 'active' : '' }}"
                                                    href="{{ route('dashboard.clinic_comments.index') }}">
                                                    <svg class="stroke-icon">
                                                        <use
                                                            href="{{ url('/') }}/assets/svg/icon-sprite.svg#stroke-table">
                                                        </use>
                                                    </svg>
                                                    <span class="">{{ __('lang.clinic_comments') }}</span>
                                                </a>
                                            </li>
                                        @endpermission

                                        {{-- Cities --}}
                                        @permission('read-city')
                                            <li class="sidebar-list ">
                                                <a class="sidebar-link {{ request()->routeIs('dashboard.geographics.index') ? 'active' : '' }}"
                                                    href="{{ route('dashboard.geographics.index') }}">
                                                    <svg class="stroke-icon">
                                                        <use
                                                            href="{{ url('/') }}/assets/svg/icon-sprite.svg#stroke-maps">
                                                        </use>
                                                    </svg>
                                                    <span class="">{{ __('lang.geographics') }}</span>
                                                </a>
                                            </li>
                                        @endpermission

                                        {{-- Adds --}}
                                        @permission('read-add')
                                            <li class="sidebar-list ">
                                                <a class="sidebar-link {{ request()->routeIs('dashboard.adds.index') ? 'active' : '' }}"
                                                    href="{{ route('dashboard.adds.index') }}">
                                                    <svg class="stroke-icon">
                                                        <use
                                                            href="{{ url('/') }}/assets/svg/icon-sprite.svg#stroke-gallery">
                                                        </use>
                                                    </svg>
                                                    <span class="">{{ __('lang.adds') }}</span>
                                                </a>
                                            </li>
                                        @endpermission

                                        {{-- Subcategories --}}
                                        @permission('read-subcategory')
                                            <li class="sidebar-list ">
                                                <a class="sidebar-link {{ request()->routeIs('dashboard.subcategories.index') ? 'active' : '' }}"
                                                    href="{{ route('dashboard.subcategories.index') }}">
                                                    <svg class="stroke-icon">
                                                        <use
                                                            href="{{ url('/') }}/assets/svg/icon-sprite.svg#stroke-widget">
                                                        </use>
                                                    </svg>
                                                    <span>{{ __('lang.subcategories') }}</span>
                                                </a>
                                            </li>
                                        @endpermission

                                        {{-- Admins --}}
                                        @permission('read-admin')
                                            <li class="sidebar-list ">
                                                <a class="sidebar-link {{ request()->routeIs('dashboard.admins.index') ? 'active' : '' }}"
                                                    href="{{ route('dashboard.admins.index') }}"
                                                    data-bs-original-title="" title="">
                                                    <svg class="stroke-icon">
                                                        <use
                                                            href="{{ url('/') }}/assets/svg/icon-sprite.svg#stroke-user">
                                                        </use>
                                                    </svg>
                                                    <span>{{ __('lang.admins') }}</span>
                                                </a>
                                            </li>
                                        @endpermission

                                        {{-- Roles --}}
                                        @permission('read-role')
                                            <li class="sidebar-list ">
                                                <a class="sidebar-link {{ request()->routeIs('dashboard.roles.index') ? 'active' : '' }}"
                                                    href="{{ route('dashboard.roles.index') }}">
                                                    <svg class="stroke-icon">
                                                        <use
                                                            href="{{ url('/') }}/assets/svg/icon-sprite.svg#stroke-social">
                                                        </use>
                                                    </svg>
                                                    <span>{{ __('lang.roles') }}</span>
                                                </a>
                                            </li>
                                        @endpermission


                                        {{-- Categories --}}
                                        @permission('read-category')
                                            <li class="sidebar-list ">
                                                <a class="sidebar-link {{ request()->routeIs('dashboard.blog_category.index') ? 'active' : '' }}"
                                                    href="{{ route('dashboard.blog_category.index') }}">
                                                    <svg class="stroke-icon">
                                                        <use
                                                            href="{{ url('/') }}/assets/svg/icon-sprite.svg#stroke-learning">
                                                        </use>
                                                    </svg>
                                                    <span class="">{{ __('lang.blog_category') }}</span>
                                                </a>
                                            </li>
                                        @endpermission

                                        {{-- Categories --}}
                                        @permission('read-category')
                                            <li class="sidebar-list ">
                                                <a class="sidebar-link {{ request()->routeIs('dashboard.blogs.index') ? 'active' : '' }}"
                                                    href="{{ route('dashboard.blogs.index') }}">
                                                    <svg class="stroke-icon">
                                                        <use
                                                            href="{{ url('/') }}/assets/svg/icon-sprite.svg#stroke-learning">
                                                        </use>
                                                    </svg>
                                                    <span class="">{{ __('lang.blogs') }}</span>
                                                </a>
                                            </li>
                                        @endpermission

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: auto; height: 2372px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                        <div class="simplebar-scrollbar"
                            style="height: 25px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                    </div>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg></div>
        </nav>
    </div>
</div>
