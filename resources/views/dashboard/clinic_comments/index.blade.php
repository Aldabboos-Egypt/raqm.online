@extends('dashboard.layouts.master')
@section('title', __('lang.clinic_comments'))

@section('content')
    @include('dashboard.layouts.includes.breadcrumb', ['title' => __('lang.clinic_comments')])

    <div class="row">
        <div class="col-md-12">

            @component('dashboard.layouts.includes.card', ['title' => __('lang.clinic_comments')])

                @slot('tool')
                @endslot

                @slot('content')

                    @component('dashboard.layouts.includes.table', ['title' => __('lang.clinic_comments')])
                        @slot('headers')
                            <th>@lang('lang.clinic')</th>
                            <th>@lang('lang.user')</th>
                            <th>@lang('lang.comment')</th>
                            <th>@lang('lang.date')</th>
                        @endslot

                        @slot('data')
                            @foreach ($resources as $data)
                                <tr>
                                    <td>{{ optional($data->clinic)->title }}</td>
                                    <td>{{ optional($data->user)->username }}</td>
                                    <td>{{ $data->comment }}</td>
                                    <td>{{ $data->created_at }}</td>
                                </tr>
                            @endforeach
                        @endslot
                    @endcomponent
                    <div class="d-flex justify-content-center mt-4">
                        {{ $resources->links() }}
                    </div>
                @endslot
            @endcomponent


        </div>
    </div>
@endsection

@section('js')
    <script></script>
@endsection
