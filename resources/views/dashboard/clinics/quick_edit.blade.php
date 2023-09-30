@extends('dashboard.layouts.master')
@section('title', __('lang.quick_edit'))
@section('content')

    @include('dashboard.layouts.includes.breadcrumb', ['title' => __('lang.clinics')])

    <div class="row">
        <div class="col-md-12">

            @component('dashboard.layouts.includes.card', ['title' => __('lang.clinics')])

                @slot('tool')
                @endslot

                @slot('content')
                    <form action="{{ route('dashboard.clinics.quick_update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @component('dashboard.layouts.includes.table', ['title' => __('lang.clinics')])
                            @slot('headers')
                                <th>@lang('lang.title')</th>
                                <th>@lang('lang.description')</th>
                                <th>@lang('lang.phone')</th>
                                <th>@lang('lang.price')</th>
                                <th>@lang('lang.subcategory')</th>
                                <th>@lang('lang.latitude')</th>
                                <th>@lang('lang.longitude')</th>
                            @endslot

                            @slot('data')
                                @foreach ($clinics as $item)
                                    <tr>
                                        <td>
                                            {!! Form::text("clinics[$item->clinic_id][title]", old("title", $item->title),[
                                                    'class' => 'form-control',
                                                ],
                                            ) !!}
                                        </td>

                                        <td>
                                            {!! Form::text("clinics[$item->clinic_id][description]", old("description", $item->description),[
                                                    'class' => 'form-control',
                                                ],
                                            ) !!}
                                        </td>

                                        <td>
                                            {!! Form::text("clinics[$item->clinic_id][phone]", old("phone", $item->phone),[
                                                    'class' => 'form-control',
                                                ],
                                            ) !!}
                                        </td>

                                        <td>
                                            {!! Form::number("clinics[$item->clinic_id][price]", old("price", $item->price),[
                                                    'class' => 'form-control',
                                                ],
                                            ) !!}
                                        </td>

                                        <td>
                                            {!! Form::select("clinics[$item->clinic_id][subcategory_id]", $subcategories,
                                                old('subcategory_id', $item->subCategory->first()->id ?? ''),[
                                                    'required',
                                                    'class' => 'form-control form-select select2',
                                                    'placeholder' => __('lang.choose_subcategory'),
                                                ],
                                            ) !!}
                                        </td>

                                        <td>
                                            {!! Form::number("clinics[$item->clinic_id][latitude]", old("latitude", $item->latitude),[
                                                    'class' => 'form-control',
                                                ],
                                            ) !!}
                                        </td>

                                        <td>
                                            {!! Form::number("clinics[$item->clinic_id][longitude]", old("longitude", $item->longitude),[
                                                    'class' => 'form-control',
                                                ],
                                            ) !!}
                                        </td>

                                    </tr>
                                @endforeach
                            @endslot
                        @endcomponent
                        {{ $clinics->appends(request()->query())->render() }}

                        <button type="submit" class="btn btn-primary mt-5">{{ __('lang.save') }}</button>
                    @endslot
                </form>
            @endcomponent
        </div>
    </div>

@endsection

@section('js')

@endsection
