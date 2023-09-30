<!--begin::Header-->
<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Header Menu Wrapper-->
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <!--begin::Header Menu-->
            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                <!--begin::Header Nav-->
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Page Title-->
                    <h5 class="text-white font-weight-bold mt-2 mb-2 mr-5">@yield('title')</h5>
                    <!--end::Page Title-->
                </div>
                <!--end::Info-->
                <!--end::Header Nav-->
            </div>
            <!--end::Header Menu-->
        </div>
        <!--end::Header Menu Wrapper-->
        <!--begin::Topbar-->
        <div class="topbar">
            <!--begin::Notifications-->
            @if(auth()->user('admin')->isAbleTo('read-notifications'))
                <div class="dropdown notification">
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px" aria-expanded="true">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1  pulse pulse-primary">
                        @if($notifications_faculty_member_un_read != 0)
                            <div class="text-center notify">
                                <span>{{ $notifications_faculty_member_un_read >= 99 ? 99 : $notifications_faculty_member_un_read }}</span>
                            </div>
                        @endif
                        <i class="far fa-bell"></i>
                        <span class="pulse-ring"></span>
                    </div>
                </div>
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg" x-placement="top-end">
                    <form>
                        <!--begin::Content-->
                        <div class="tab-content">
                            <!--begin::Tabpane-->
                            <div class="tab-pane active show p-8" id="topbar_notifications_notifications" role="tabpanel">
                                <!--begin::Scroll-->
                                <div class="scroll pr-7 mr-n7 ps ps--active-y" data-scroll="true" data-height="300" data-mobile-height="200" style="height: 300px; overflow: hidden;">
                                    <h6>{{ __('lang.notifications') }} <a href="{{ route('dashboard.notification_faculty_member') }}" style="color: #26529b;" class="{{ app()->getLocale() == 'ar' ? 'fl-l' : 'fl-r' }}">{{ __('lang.view_all') }}</a></h6>

                                    <br>
                                    <!--begin::Item-->
                                    @if($notifications_faculty_member->count() == 0)
                                        <p class="text-muted text-center" style="font-size: 18px;margin-top: 40%">{{ __('lang.notifications_empty') }}</p>
                                    @endif
                                    @foreach($notifications_faculty_member as $notification)
                                        <a href="{{route('dashboard.faculty_member.show',$notification->data['id']) . '?member_data=1' }}">
                                            <div class="d-flex align-items-center mb-6 {{ $notification->read_at == null ? 'notification_item' : 'notification_item_read' }}">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40 {{ $notification->read_at == null ? 'symbol-light-success' : 'symbol-light-primary' }} mr-5">
                                                    <span class="symbol-label">
                                                        <span class="svg-icon svg-icon-lg {{ $notification->read_at == null ? 'svg-icon-success' : 'svg-icon-primary' }}">
                                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Group-chat.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000"></path>
                                                                    <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3"></path>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Text-->
                                                <div class="d-flex flex-column font-weight-bold">
                                                    <span class="text-dark mb-1 font-size-lg">{{ app()->getLocale() == 'ar' ? $notification->data['message_ar'] : $notification->data['message_en'] }}</span>
                                                    <a href="{{route('dashboard.faculty_member.show',$notification->data['id']) . '?member_data=1' }}" class="text-dark mb-1 font-size-lg">{{ $notification->data['username'] }}
                                                    </a>
                                                    <a href="{{route('dashboard.faculty_member.show',$notification->data['id']) . '?member_data=1' }}"><span class="text-black-50">{{ $notification->data['email'] }}</span></a>
                                                    <a href="{{route('dashboard.faculty_member.show',$notification->data['id']) . '?member_data=1' }}"><span class="text-black-50">{{ $notification->created_at->diffForHumans() }}</span></a>
                                                </div>
                                                <!--end::Text-->
                                            </div>
                                        </a>
                                    @endforeach
                                    <!--end::Item-->
                                    <!--end::Item-->
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px; height: 300px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 205px;"></div></div></div>
                                <!--end::Scroll-->
                            </div>
                            <!--end::Tabpane-->
                        </div>
                        <!--end::Content-->
                    </form>
                </div>
            </div>
            @endif
            <!--begin::Languages-->
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item" data-offset="10px,0px">
                    <a href="{{ route('lang',['lang'=> __('lang.lang_url') ]) }}">
                        <a class="lang_switcher btn btn-icon btn-clean btn-dropdown btn-lg mr-1" href="{{ route('lang',['lang'=> __('lang.lang_url') ]) }}">{{ __('lang.lang') }}</a>
                    </a>
                </div>
                <!--end::Toggle-->
                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                    <!--begin::Nav-->
                    <ul class="navi navi-hover py-4">
                        <!--begin::Item-->
                        <li class="navi-item">
                            <a href="{{ route('lang',['lang'=> __('lang.lang_url') ]) }}" class="navi-link">
                                <span class="navi-text">{{ __('lang.lang')}}</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->

                        <!--end::Item-->
                    </ul>
                    <!--end::Nav-->
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Languages-->
            <!--begin::User-->
            <div class="topbar-item">
                <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                    <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{$admin->username}}</span>
                    <img class="rounded" src="{{ $admin->image ? asset(auth('admin')->user()->image) : asset('admin/assets/images/user.png') }}" width="30">
                </div>
            </div>
            <!--end::User-->
            <!--end::User-->
            <!-- begin::User Panel-->
            <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
                <!--begin::Header-->
                <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
                    <h3 class="font-weight-bold m-0">{{__('lang.profile')}}</h3>
                    <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
                        <i class="ki ki-close icon-xs text-muted"></i>
                    </a>
                </div>
                <!--end::Header-->
                <!--begin::Content-->
                <div class="offcanvas-content pr-5 mr-n5">
                    <!--begin::Header-->
                    <div class="d-flex align-items-center mt-5">
                        <div class="symbol symbol-100 mr-5">
                            <div class="symbol-label" style="background-image:url({{ $admin->image ? asset(auth('admin')->user()->image) : asset('admin/assets/images/user.png') }})"></div>
                            <i class="symbol-badge bg-success"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <a href="{{ route('dashboard.profile') }}" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{$admin->username}}</a>
                            <div class="navi mt-2">
                                <a href="{{ route('dashboard.profile') }}" class="navi-item">
								<span class="navi-link p-0 pb-2">
									<span class="navi-icon mr-1">
										<span class="svg-icon svg-icon-lg svg-icon-primary">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
													<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
									</span>
									<span class="navi-text text-muted text-hover-primary">{{$admin->email}}</span>
								</span>
                                </a>
                                <a href="{{ route('dashboard.profile') }}"><i class="icon-key"></i>  {{ __('lang.profile') }}</a> -
                                <a href="{{ url('dashboard/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon-key"></i>  {{ __('lang.logout') }}</a>
                                <form id="logout-form" action="{{ url('dashboard/logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </div>
                        </div>
                    </div>
                    <!--end::Header-->
                </div>
                <!--end::Content-->
            </div>
            <!-- end::User Panel-->

        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->
