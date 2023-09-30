@extends('dashboard.layouts.master')
@section('title', __('lang.admins'))

@section('content')
    @include('dashboard.layouts.includes.breadcrumb', [
        'title' => $admin->id ? __('lang.edit_admin') : __('lang.create_admin'),
        'new_item' =>
            '<li class="breadcrumb-item"><a class="text-muted" href="' .
            route('dashboard.admins.index') .
            '">' .
            __('lang.admins') .
            ' </a></li>',
    ])

    <div class="row">
        <div class="col-md-12">

            @component('dashboard.layouts.includes.card', ['title' => __('lang.admins')])
                @slot('content')
                    {!! Form::open([
                        'route' => $admin->id ? ['dashboard.admins.update', $admin->id] : 'dashboard.admins.store',
                        'method' => 'post',
                        'files' => true,
                    ]) !!}
                    @if ($admin->id)
                        @method('PATCH')
                    @endif

                    <div class="row">
                        <input type="text" name="id" value="{{ $admin->id }}" hidden>

                        <div class="col-md-6 col-sm-12 mb-2 pt-2">
                            {!! Form::label('name', __('lang.name')) !!}
                            <span class="text-danger">*</span>
                            {!! Form::text('name', old('name', $admin->name ?? ''), [
                                'class' => 'form-control',
                                'required',
                                'placeholder' => __('lang.name'),
                            ]) !!}
                        </div>

                        <div class="col-md-6 col-sm-12 mb-2 pt-2">
                            {!! Form::label('email', __('lang.email')) !!}
                            <span class="text-danger">*</span>
                            {!! Form::email('email', old('email', $admin->email ?? ''), [
                                'class' => 'form-control',
                                'required',
                                'placeholder' => __('lang.email'),
                            ]) !!}
                        </div>

                        <div class="col-md-6 col-sm-12 mb-2 pt-2">
                            {!! Form::label('password', __('lang.password')) !!}
                            <span class="text-danger">*</span>
                            {!! Form::password('password', [
                                'class' => 'form-control',
                                $admin->id ? '' : 'required',
                                'placeholder' => __('lang.password'),
                            ]) !!}
                        </div>

                        <div class="col-md-6 col-sm-12 mb-2 pt-2">
                            {!! Form::label('password_confirmation', __('lang.password_confirmation')) !!}
                            <span class="text-danger">*</span>
                            {!! Form::password('password_confirmation', [
                                'class' => 'form-control',
                                $admin->id ? '' : 'required',
                                'placeholder' => __('lang.password_confirmation'),
                            ]) !!}
                        </div>

                        <div class="col-md-6 col-sm-12 mb-2 pt-2">
                            {!! Form::label('role', __('lang.roles')) !!}
                            <span class='txt-danger'>*</span>

                            {!! Form::select('role', $roles->pluck('display_name', 'name'), $admin->roles()->first()->name ?? '', [
                                'class' => 'form-control select2',
                                'required',
                                'placeholder' => __('lang.choose_role'),
                            ]) !!}
                        </div>

                    </div>
                    {!! Form::submit(__('lang.save'), ['class' => 'btn btn-primary mt-5']) !!}

                    {!! Form::close() !!}
                @endslot
            @endcomponent


        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function() {


        });
    </script>
@endsection
