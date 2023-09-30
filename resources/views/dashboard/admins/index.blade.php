@extends('dashboard.layouts.master')
@section('title', __('lang.admins'))

@section('content')
    @include('dashboard.layouts.includes.breadcrumb', ['title' => __('lang.admins')])

    <div class="row">
        <div class="col-md-12">

            @component('dashboard.layouts.includes.card', ['title' => __('lang.admins')])


                @slot('tool')
                    <a href="{{ route('dashboard.admins.create') }}" class="btn btn-primary">@lang('lang.add')</a>
                @endslot

                @slot('content')

                    @component('dashboard.layouts.includes.table')
                        @slot('headers')
                            <th>#</th>
                            <th>@lang('lang.name')</th>
                            <th>@lang('lang.email')</th>
                            <th>@lang('lang.role')</th>
                            <th colspan="2">@lang('lang.actions')</th>
                        @endslot

                        @slot('data')
                            @foreach ($admins as $index => $admin)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td> {{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->roles()->first()->display_name ?? '' }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.admins.edit', $admin->id) }}" style="cursor: pointer"
                                            class=" text-primary "> <span data-feather="edit"></span></a>

                                        <a href="{{ route('dashboard.admins.destroy', $admin->id) }}" style="font-size: 20px"
                                            class="sw-alert text-danger">
                                            <span data-feather="trash-2"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endslot
                    @endcomponent
                    <div class="d-flex justify-content-center mt-4">
                        {{ $admins->links() }}
                    </div>
                @endslot
            @endcomponent


        </div>
    </div>
@endsection

@section('js')
    <script></script>
@endsection
