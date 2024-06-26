<div class="page-title">
    <div class="row">
        <div class="col-6">
            <h3>{{ $title }}</h3>
        </div>
        <div class="col-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <g>
                                    <path d="M9.07861 16.1355H14.8936" stroke="#130F26" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M2.3999 13.713C2.3999 8.082 3.0139 8.475 6.3189 5.41C7.7649 4.246 10.0149 2 11.9579 2C13.8999 2 16.1949 4.235 17.6539 5.41C20.9589 8.475 21.5719 8.082 21.5719 13.713C21.5719 22 19.6129 22 11.9859 22C4.3589 22 2.3999 22 2.3999 13.713Z"
                                        stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </g>
                            </g>vendor
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item">{{ __('lang.dashboard') }}</li>
                @if (isset($new_item))
                    {!! $new_item !!}
                @endif
                <li class="breadcrumb-item active">{{ $title }}</li>

            </ol>
        </div>
    </div>
</div>
