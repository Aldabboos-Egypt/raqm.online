@extends('dashboard.layouts.master')
@section('title', __('lang.geographics'))

@section('content')
    @include('dashboard.layouts.includes.breadcrumb', ['title' => __('lang.geographics')])

    <div class="row">
        <div class="col-md-12">

            <div class="modal fade ceate-category-button" tabindex="-1" aria-labelledby="creatLangModalLabel"
                aria-hidden="true">
            </div>

            <div class="modal fade edit-category-button" tabindex="-1" aria-labelledby="creatLangModalLabel"
                aria-hidden="true">
            </div>

            @component('dashboard.layouts.includes.card', ['title' => __('lang.geographics')])

                @slot('tool')
                    <a data-href="{{ route('dashboard.geographics.create') }}" data-container=".ceate-category-button"
                        class="btn btn-primary btn-modal">@lang('lang.add')</a>
                @endslot

                @slot('content')

                    @component('dashboard.layouts.includes.table', ['title' => __('lang.geographics')])
                        @slot('headers')
                            <th>@lang('lang.name')</th>
                            <th>@lang('lang.state')</th>
                            <th>@lang('lang.country_code')</th>
                            <th colspan="2">@lang('lang.actions')</th>
                        @endslot

                        @slot('data')
                            @foreach ($geographics as $data)
                                <tr>
                                    <td>{{ $data->city ?? ''}}</td>
                                    <td>{{ $data->state ?? '' }}</td>
                                    <td>{{ $data->country_code ?? '' }}</td>
                                    <td class="d-flex justify-content-start">
                                        <a data-href="{{ route('dashboard.geographics.edit',$data->city_id) }}" data-container=".edit-category-button" id="btn-edit-category" style="cursor: pointer" class=" text-primary "> <span data-feather="edit"></span></a>

                                        <a href="{{ route('dashboard.geographics.destroy', $data->city_id) }}" style="font-size: 20px" class="sw-alert text-danger">
                                            <span data-feather="trash-2"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endslot
                    @endcomponent
                    <div class="d-flex justify-content-center mt-4">
                        {{ $geographics->links() }}
                    </div>
                @endslot
            @endcomponent


        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function() {

            // show create modal
            $('.btn-modal').on('click', function(event) {
                event.preventDefault();
                let url = $(this).data('href');
                let container = $(this).data('container');
                $.ajax({
                    url: url,
                    dataType: 'html',
                    method: 'GET',
                    success: function(res) {
                        $(container)
                            .html(res)
                            .modal('show');
                    }
                });
            });
            // end show modal

            // edit
            $(document).on('click', '#btn-edit-category', function(e) {
                e.preventDefault();
                event.preventDefault();
                let url = $(this).data('href');
                let container = $(this).data('container');
                $.ajax({
                    url: url,
                    dataType: 'html',
                    method: 'GET',
                    success: function(res) {
                        $(container)
                            .html(res)
                            .modal('show');
                    }
                });
            });
        });
    </script>
@endsection
