@extends('dashboard.layouts.master')
@section('title', __('lang.clinic_requests'))

@section('content')
    @include('dashboard.layouts.includes.breadcrumb', ['title' => __('lang.clinic_requests')])

    <div class="row">
        <div class="col-md-12">

            @component('dashboard.layouts.includes.card', ['title' => __('lang.clinic_requests')])

                @slot('tool')
                @endslot

                @slot('content')

                    @component('dashboard.layouts.includes.table', ['title' => __('lang.clinic_requests')])
                        @slot('headers')
                            <th>@lang('lang.clinic')</th>
                            <th>@lang('lang.user')</th>
                            <th>@lang('lang.subcategory')</th>
                            <th>@lang('lang.name')</th>
                            <th>@lang('lang.phone')</th>
                            <th>@lang('lang.description')</th>
                            <th>@lang('lang.notes')</th>
                            <th colspan="2">@lang('lang.actions')</th>
                        @endslot

                        @slot('data')
                            @foreach ($resources as $data)
                                <tr>
                                    <td>{{ optional($data->clinic)->title }}</td>
                                    <td>{{ optional($data->user)->username }}</td>
                                    <td>{{ optional($data->subcategory)->name }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>{{ $data->description }}</td>
                                    <td>{{ $data->notes }}</td>
                                    <td class="d-flex justify-content-start">
                                        @if ($data->status == 'pending')
                                            <button class="btn btn-success m-1" onclick="changeStatus({{ $data->id }}, 'approved')">
                                                <i class='fa fa-check'></i>
                                            </button>
                                            <button class="btn btn-danger m-1" onclick="changeStatus({{ $data->id }}, 'rejected')">
                                                <i class='fa fa-close'></i>
                                            </button>
                                        @endif
                                    </td>
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
    <script>
        function changeStatus(id, status) {
            if (!confirm('{{ __('lang.are_you_sure') }}')) {
                return;
            }
            $.ajax({
                url: "{{ route('dashboard.clinic_requests.changeStatus') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    status: status
                },
                success: function(response) {
                    if (response.status == true) {
                        iziToast.success({
                            title: response.message,
                        });
                        location.reload();
                    } else {
                        iziToast.error({
                            title: response.message,
                        });
                    }
                }
            });
        }
    </script>
@endsection
