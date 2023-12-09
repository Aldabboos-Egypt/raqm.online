@extends('dashboard.layouts.master')
@section('title', __('lang.messages'))

@section('content')
    @include('dashboard.layouts.includes.breadcrumb', ['title' => __('lang.messages')])

    <div class="row">
        <div class="col-md-12">

            @component('dashboard.layouts.includes.card', ['title' => __('lang.messages')])

                @slot('tool')
                @endslot

                @slot('content')

                    @component('dashboard.layouts.includes.table', ['title' => __('lang.messages')])
                        @slot('headers')
                            <th>@lang('lang.name')</th>
                            <th>@lang('lang.subject')</th>
                            <th>@lang('lang.email')</th>
                            <th>@lang('lang.message')</th>
                        @endslot

                        @slot('data')
                            @foreach ($resources as $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->subject }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->message }}</td>

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

@endsection
