@extends('dashboard.layouts.master')
@php
    $title = $resource->id ? __('lang.edit_role') : __('lang.add_role');

@endphp

@section('title', $title)
@section('content')

    @include('dashboard.layouts.includes.breadcrumb', [
        'title' => $title,
        'new_item' =>
            '<li class="breadcrumb-item"><a class="text-muted" href="' .
            route('dashboard.roles.index') .
            '">' .
            __('lang.roles') .
            ' </a></li>',
    ])


    <div class="row">
        <div class="col-md-12">

            @component('dashboard.layouts.includes.card', ['title' => $title])


                @slot('content')
                    <form class="needs-validation was-validated"
                        action="{{ $resource->id ? route('dashboard.roles.update', $resource->id) : route('dashboard.roles.store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @if ($resource->id)
                            @method('PATCH')
                        @endif
                        <div class="row">

                            <div class="col-md-6 pt-2">
                                <div class="form-group">
                                    <label>{{ __('lang.name') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" required
                                        value="{{ old('name', $resource->name ?? '') }}">
                                </div>
                            </div>

                            <div class="col-md-6 pt-2">
                                <div class="form-group">
                                    <label>{{ __('lang.display_name') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="display_name" required
                                        value="{{ old('display_name', $resource->display_name ?? '') }}">
                                </div>
                            </div>
                            <div class="col-md-12 pt-2">
                                <div class="form-group">
                                    <label>{{ __('lang.description') }}</label>
                                    <input type="text" class="form-control" name="description"
                                        value="{{ old('description', $resource->description ?? '') }}">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="" style="margin-top: 20px!important">
                                <div class="card-header" style="padding: 15px!important">
                                    <h3>{{ __('lang.permissions') }}</h3>
                                    <label class="d-block" for="CheckAllPerm">
                                        <input type="checkbox" class="w3-check" id="CheckAllPerm">
                                        {{ __('lang.select_all') }}
                                    </label>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($permissions as $category => $listPermissions)
                                            <div class="col-md-4">

                                                @component('dashboard.layouts.includes.card', ['title' => __('lang.' . $category), 'class' => 'bg-primary'])
                                                    @slot('content')
                                                        <ul class="w3-ul sub-list">
                                                            @foreach ($listPermissions as $permission)
                                                                <li style="border-bottom: 0px; padding: 0px; height: 60px">
                                                                    <label class=""></label>
                                                                    @php $old = old('permissions') @endphp
                                                                    <label class="d-block" for="chk-ani-{{ $permission->id }}">
                                                                        <input class="w3-check selectedBoxPerm checkbox me-2"
                                                                            id="chk-ani-{{ $permission->id }}"
                                                                            type="checkbox"name="permissions[]"
                                                                            value="{{ $permission->id }}"
                                                                            {{ isset($old) ? (in_array($permission->id, old('permissions')) ? 'checked' : '') : '' }}
                                                                            {{ isset($rolePermissions) ? (in_array($permission->id, $rolePermissions) ? 'checked' : '') : '' }}
                                                                            data-bs-original-title=""
                                                                            title="">{{ app()->getLocale() == 'ar' ? $permission->description : $permission->display_name }}
                                                                    </label>
                                                                    {{-- <input type="checkbox" class="w3-check selectedBoxPerm checkbox" > --}}
                                                                    <span></span>
                                                                    </label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endslot
                                                @endcomponent
                                            </div>
                                        @endforeach
                                    </div>


                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                @if ($resource->id)
                                    {{ __('lang.save') }}
                                @else
                                    {{ __('lang.save') }}
                                @endif
                            </button>
                        </div>
                    </form>
                @endslot
            @endcomponent
        </div>


    </div>
    {{-- <div class="modal fade role-model" id="vendor-model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    </div> --}}
@endsection

@section('js')
    <script>
        $('#CheckAllPerm').on('click', function() {
            if ($(this).prop('checked') === true) {
                $('.selectedBoxPerm').prop('checked', true);

            } else {
                $('.selectedBoxPerm').prop('checked', false);
            }
        });
    </script>
@endsection
