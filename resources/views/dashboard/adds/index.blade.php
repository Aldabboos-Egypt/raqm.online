@extends('dashboard.layouts.master')
@section('title', __('lang.adds'))

@section('content')
    @include('dashboard.layouts.includes.breadcrumb', ['title' => __('lang.adds')])

    <div class="row">
        <div class="col-md-12">

            <div class="modal fade ceate-category-button" tabindex="-1" aria-labelledby="creatLangModalLabel"
                aria-hidden="true">
            </div>

            <div class="modal fade edit-category-button" tabindex="-1" aria-labelledby="creatLangModalLabel"
                aria-hidden="true">
            </div>

            @component('dashboard.layouts.includes.card', ['title' => __('lang.adds')])

                @slot('tool')
                    <a data-href="{{ route('dashboard.adds.create') }}" data-container=".ceate-category-button"
                        class="btn btn-primary btn-modal">@lang('lang.add')</a>
                @endslot

                @slot('content')

                    @component('dashboard.layouts.includes.table', ['title' => __('lang.adds')])
                        @slot('headers')
                            <th>@lang('lang.image')</th>
                            <th>@lang('lang.title')</th>
                            <th>@lang('lang.description')</th>
                            <th>@lang('lang.link')</th>
                            <th>@lang('lang.page')</th>
                            <th>@lang('lang.date_from')</th>
                            <th>@lang('lang.date_to')</th>
                            <th>@lang('lang.views')</th>
                            <th colspan="2">@lang('lang.actions')</th>
                        @endslot

                        @slot('data')
                            @foreach ($adds as $data)
                                <tr>
                                    <td>
                                        <img src="{{ asset($data->image) }}" width="30" height="30">
                                    </td>
                                    <td>{{ $data->title ?? '' }}</td>
                                    <td>{{ $data->description ?? '' }}</td>
                                    <td>{{ $data->link ?? '' }}</td>
                                    <td>{{ $data->page ?? '' }}</td>
                                    <td>{{ $data->date_from ?? '' }}</td>
                                    <td>{{ $data->date_to ?? '' }}</td>
                                    <td>{{ $data->getViews() }}</td>
                                    <td class="d-flex justify-content-start">
                                        <a data-href="{{ route('dashboard.adds.edit', $data->id) }}" data-container=".edit-category-button"
                                            id="btn-edit-category" style="cursor: pointer" class=" text-primary "> <span
                                                data-feather="edit"></span></a>

                                        <a href="{{ route('dashboard.adds.destroy', $data->id) }}" style="font-size: 20px"
                                            class="sw-alert text-danger">
                                            <span data-feather="trash-2"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endslot
                    @endcomponent
                    <div class="d-flex justify-content-center mt-4">
                        {{ $adds->links() }}
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
                        $('form').each(function() {
                            var newAction = $(this).attr('action')
                                .replace('http:', 'https:');
                            $(this).attr('action', newAction);
                        });
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


        $(".image").change(function() {
            alert('test');
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.image-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
@endsection
