@extends('dashboard.layouts.master')
@section('title', __('lang.blog_category'))

@section('content')
    @include('dashboard.layouts.includes.breadcrumb', ['title' => __('lang.blog_category')])

    <div class="row">
        <div class="col-md-12">

            <div class="modal fade ceate-category-button" tabindex="-1" aria-labelledby="creatLangModalLabel"
                aria-hidden="true">
            </div>

            <div class="modal fade edit-category-button" tabindex="-1" aria-labelledby="creatLangModalLabel"
                aria-hidden="true">
            </div>

            @component('dashboard.layouts.includes.card', ['title' => __('lang.blog_category')])

                @slot('tool')
                    <a data-href="{{ route('dashboard.blog_category.create') }}" data-container=".ceate-category-button"
                        class="btn btn-primary btn-modal">@lang('lang.add')</a>
                @endslot

                @slot('content')

                    @component('dashboard.layouts.includes.table', ['title' => __('lang.blog_category')])
                        @slot('headers')
                            <th>@lang('lang.name')</th>
                            <th>@lang('lang.description')</th>
                            <th>@lang('lang.name_ar')</th>
                            <th>@lang('lang.description_ar')</th>
                            <th colspan="2">@lang('lang.actions')</th>
                        @endslot

                        @slot('data')
                            @foreach ($blog_category as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>{{ $category->name_ar }}</td>
                                    <td>{{ $category->description_ar }}</td>
                                    <td class="d-flex justify-content-start">
                                        <a data-href="{{ route('dashboard.blog_category.edit', $category->id) }}"
                                            data-container=".edit-category-button" id="btn-edit-category" style="cursor: pointer"
                                            class=" text-primary "> <span data-feather="edit"></span></a>

                                        <a href="{{ route('dashboard.blog_category.destroy', $category->id) }}" style="font-size: 20px"
                                            class="sw-alert text-danger">
                                            <span data-feather="trash-2"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endslot
                    @endcomponent
                    <div class="d-flex justify-content-center mt-4">
                        {{ $blog_category->links() }}
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
