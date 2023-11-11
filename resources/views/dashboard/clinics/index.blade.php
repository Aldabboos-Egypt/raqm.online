@extends('dashboard.layouts.master')
@section('title', __('lang.clinics'))

@section('content')
    @include('dashboard.layouts.includes.breadcrumb', ['title' => __('lang.clinics')])

    <div class="row">
        <div class="col-md-12">
            @component('dashboard.layouts.includes.card', ['title' => __('lang.filter'), 'id' => 'filter_body'])
                @slot('tool')
                    <button class="btn btn-xs btn-success" onclick="$('#filter_body').slideToggle()"> <i
                            class="fa fa-2x fa-filter text-white"></i>
                    </button>
                @endslot

                @slot('content')
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('subcategory', __('lang.subcategory')) !!}
                            {!! Form::select('subcategory', $subCategories, null, [
                                'class' => 'form-select select2',
                                'placeholder' => __('lang.choose_subcategory'),
                            ]) !!}
                        </div>

                        <div class="col-md-6">
                            {!! Form::label('is_trust', __('lang.is_trust')) !!}
                            {!! Form::select('is_trust', ['trusted' => __('lang.trust'), 'not_trusted' => __('lang.not_trust')], null, [
                                'class' => 'form-select',
                                'placeholder' => __('lang.choose'),
                            ]) !!}
                        </div>
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            @component('dashboard.layouts.includes.card', ['title' => __('lang.clinics')])
                @slot('tool')
                    <div class="d-flex justify-content-between">

                        <div class="me-2">
                            <div>
                                <a href="{{ route('dashboard.clinics.create') }}" class="btn btn-primary">@lang('lang.add')</a>
                                <a href="{{ route('dashboard.clinics.quick_edit') }}" id="quick_edit"
                                    class="btn btn-primary">@lang('lang.quick_edit')</a>

                                <a data-href="{{ route('dashboard.clinics.import_modal') }}" data-container=".table-modal-import"
                                    style="cursor: pointer; font-weight: bold;" class="btn-modal btn btn-outline-info ms-1"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;font-size: 20px;">
                                    <i class="ti ti-upload"></i> {{ __('lang.import') }}
                                </a>
                            </div>

                        </div>

                        <div>
                            <a target="_blank" href="{{ route('dashboard.clinics.export') }} " id="exportLink"
                                class="btn btn-outline-primary">@lang('lang.export')</a>
                            <input type="number" class="px-2 py-1" id="limit" placeholder="{{ __('lang.number_of_records') }}">
                        </div>

                    </div>
                @endslot

                @slot('content')
                    {{ $dataTable->table(['class' => 'dataTable table table-bordered table-hover']) }}
                @endslot
            @endcomponent

            <div class="modal fade table-modal-import" id="table-model-import" tabindex="-1"
                aria-labelledby="table-model-import" aria-hidden="true">
            </div>

        </div>
    </div>
@endsection

@section('js')
    {{ $dataTable->scripts() }}

    <script>
        function deleteClinic(elem) {
            if (confirm('Are you sure?')) {
                window.location.href = $(elem).data('href');
            }
        }

        $(document).ready(function() {
            $('input[type="search"]').attr('id', 'search');

            // filter by subcategory
            const table = $('#clinicsdatatable');
            $("#subcategory").on("change", function() {
                table.on('preXhr.dt', function(event, settings, data) {
                    data.subcategoryId = $('#subcategory').val();
                });
                table.DataTable().ajax.reload();
            });

            $('#is_trust').on('change', function() {
                table.on('preXhr.dt', function(event, settings, data) {
                    data.isTrust = $('#is_trust').val();
                });
                table.DataTable().ajax.reload();
            });
        });


        $('#limit').keyup(function() {
            let href = $('#exportLink').attr('href');
            // replace all spaces in string href
            href = href.replace(/\s/g, '');
            let baseLink = "{{ toHttps(route('dashboard.clinics.export')) }}";

            href = baseLink + "?limit=" + $('#limit').val();
            $('#exportLink').attr('href', href);
            console.log(href)
        });

        $('#export').click(function(e) {
            e.preventDefault();
            window.location.href = "{{ route('dashboard.clinics.export') }}?search=" + $('#search').val() +
                "&limit=" + $('#limit').val();
        });

        $('#all').on('click', function() {
            $('input[name="ids[]"]').prop('checked', $(this).prop('checked'));
        });

        $('#quick_edit').on('click', function(e) {
            e.preventDefault();
            console.log();
            let ids = [];
            $('input[name="ids[]"]:checked').each(function() {
                ids.push($(this).val());
            })
            console.log(ids);
            window.location.href = "{{ route('dashboard.clinics.quick_edit') }}?ids=" + ids;
        });

        // change is_trust value
        function isTrust(el, id) {
            if ($(el).val() == 0) {
                $(el).val(1);
                is_trust = 1
            } else {
                $(el).val(0);
                is_trust = 0;
            }
            var url = "{{ toHttps(route('dashboard.clinics.is_trust')) }}";
            $.post(url, {
                _token: "{{ csrf_token() }}",
                id: id,
                is_trust: is_trust,
            }, function(results) {
                if (results.success == true) {
                    iziToast.success({
                        title: results.message,
                    });
                }
            });
        }

        // change is_trust value
        function publishMethod(el, id) {
            if ($(el).val() == 0) {
                $(el).val(1);
                publish = 1
            } else {
                $(el).val(0);
                publish = 0;
            }
            var url = "{{ toHttps(route('dashboard.clinics.publish')) }}";
            $.post(url, {
                _token: "{{ csrf_token() }}",
                id: id,
                publish: publish,
            }, function(results) {
                if (results.success == true) {
                    iziToast.success({
                        title: results.message,
                    });
                }
            });
        }
    </script>
@endsection
