@extends('vendor::layouts.master')
@php
    $title = $store->id ? __('admin.store.edit') : __('admin.store.add');
@endphp

@section('title', $title)
@section('content')

    @include('vendor::layouts.includes.breadcrumb', [
        'title' => $title,
        'new_item' =>
            '<li class="breadcrumb-item"><a class="text-muted" href="' .
            route('vendor.stores.index') .
            '">' .
            __('admin.stores') .
            ' </a></li>',
    ])

    <div class="card height-equal">
        <div class="card-header">
            {{-- <h4>Numbering wizard </h4> --}}
            {{-- <p class="f-m-light mt-1">
                Fill up your details and proceed next steps.</p> --}}
        </div>

        <div class="card-body basic-wizard important-validation">

            <div class="stepper-horizontal" id="stepper1">
                <div class="tab stepper-one stepper step">
                    <div class="step-circle"><span>1</span></div>
                    <div class="step-title">{{ __('admin.main_info') }}</div>
                    <div class="step-bar-left"></div>
                    <div class="step-bar-right"></div>
                </div>
                <div class="tab stepper-two step">
                    <div class="step-circle"><span>2</span></div>
                    <div class="step-title">{{ __('admin.main_info') }} 2</div>
                    <div class="step-bar-left"></div>
                    <div class="step-bar-right"></div>
                </div>
                <div class="tab stepper-three step">
                    <div class="step-circle"><span>3</span></div>
                    <div class="step-title">{{ __('admin.store.social_media') }}</div>
                    <div class="step-bar-left"></div>
                    <div class="step-bar-right"></div>
                </div>
                <div class="tab stepper-four step">
                    <div class="step-circle"><span>4</span></div>
                    <div class="step-title">{{ __('admin.user_info') }}</div>
                    <div class="step-bar-left"></div>
                    <div class="step-bar-right"></div>
                </div>
                {{-- <div class="tab stepper-four step">
                    <div class="step-circle"><span>5</span></div>
                    <div class="step-title">{{ __('admin.branch_info') }}</div>
                    <div class="step-bar-left"></div>
                    <div class="step-bar-right"></div>
                </div> --}}
            </div>

            <form id="msform"
                action="{{ $store->id ? route('vendor.stores.update', $store->id) : route('vendor.stores.store') }}"
                method="post" enctype="multipart/form-data">

                @csrf

                @if ($store->id)
                    @method('PUT')
                @endif

                <input type="text" name="id" value="{{ $store->getStoreAdmin()->id ?? '' }}" hidden>

                <div class="form stepper-one row g-3 needs-validation custom-input" novalidate="" style="display: flex;">
                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('logo', __('admin.store.logo') . ' :* ') !!} <br>

                        <img class="mb-4 image-preview-logo " width="500" height="250" src="{{ asset($store->logo ?? 'assets/images/user/7.jpg') }}">

                        <label for="logoFile"class=" mt-2">
                            <i class="ti ti-cloud-upload h3 cursor-pointer"></i>
                        </label>

                        <input type="file" onchange="changeImage(this, 'logo')" id="logoFile" class="d-none form-control mt-3" name="logo" {{ $store->id ? '' : 'required' }}>
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('cover', __('admin.store.cover') . ' :* ') !!} <br>

                        <img class="mb-4 image-preview-cover " width="500" height="250" src="{{ asset($store->cover ?? 'assets/images/user/7.jpg') }}">

                        <label for="coverFile"class=" mt-2">
                            <i class="ti ti-cloud-upload h3 cursor-pointer"></i>
                        </label>

                        <input type="file" onchange="changeImage(this, 'cover')" id="coverFile" class="d-none form-control mt-3" name="cover" {{ $store->id ? '' : 'required' }}>
                    </div>

                    @foreach (config('translatable.locales') as $locale)
                        <div class="col-md-6 pt-3">
                            {!! Form::label('name-' . $locale, __('admin.store.name_' . $locale) . ' :* ') !!}
                            {!! Form::text("$locale" . '[name]', old("$locale" . '[name]', optional($store->translate($locale))->name), [
                                'class' => 'form-control',
                                'required',
                            ]) !!}
                        </div>
                    @endforeach


                     <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('business_type_id', __('admin.store.business_type')) !!}

                        {!! Form::select('business_type_id', $businessTypes->pluck('title', 'id'), old('business_type', $store->business_type_id),
                            ['class' => 'form-control select2']) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('tax_number', __('admin.store.tax_number')) !!}
                        {!! Form::text('tax_number', old('tax_number', $store->tax_number), [
                            'class' => 'form-control',
                            'placeholder' => __('admin.store.tax_number'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('commercial_number', __('admin.store.commercial_number')) !!}
                        {!! Form::text('commercial_number', old('commercial_number', $store->commercial_number), [
                            'class' => 'form-control',
                            'placeholder' => __('admin.store.commercial_number'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('iban', __('admin.store.iban')) !!}
                        {!! Form::text('iban', old('iban', $store->iban), [
                            'class' => 'form-control',
                            'placeholder' => __('admin.store.iban'),
                        ]) !!}
                    </div>
                </div>

                <div class="form stepper-two row g-3 needs-validation custom-input" novalidate="" style="display: none;">
                    @foreach (config('translatable.locales') as $locale)
                        <div class="col-md-6 pt-3">
                            {!! Form::label('short_description-' . $locale, __('admin.store.short_description_' . $locale) . ' :* ') !!}
                            {!! Form::text(
                                "$locale" . '[short_description]',
                                old("$locale" . '[short_description]', optional($store->translate($locale))->short_description),
                                [
                                    'class' => 'form-control',
                                    'required',
                                ],
                            ) !!}
                        </div>
                    @endforeach


                    @foreach (config('translatable.locales') as $locale)
                        <div class="col-md-6 pt-3">
                            {!! Form::label('description-' . $locale, __('admin.store.description_' . $locale) . ' :* ') !!}
                            {!! Form::textarea(
                                "$locale" . '[description]',
                                old("$locale" . '[description]', optional($store->translate($locale))->description),
                                [
                                    'class' => 'form-control',
                                    'required',
                                ],
                            ) !!}
                        </div>
                    @endforeach

                    @foreach (config('translatable.locales') as $locale)
                        <div class="col-md-6 pt-3">
                            {!! Form::label('terms-' . $locale, __('admin.store.terms_' . $locale) . ' :* ') !!}
                            {!! Form::textarea(
                                "$locale" . '[terms]',
                                old("$locale" . '[terms]', optional($store->translate($locale))->terms),
                                [
                                    'class' => 'form-control',
                                    'required',
                                ],
                            ) !!}
                        </div>
                    @endforeach
                </div>

                <div class="form stepper-three row g-3 needs-validation custom-input" novalidate="" style="display: none;">

                    <div class="col-sm-6 col-md-6 pt-3">
                        {!! Form::label('social_media_facebook', __('admin.store.facebook')) !!}
                        {!! Form::text('social_media[facebook]', old('social_media[facebook]', $store->social_media['facebook'] ?? ''), [
                            'class' => 'form-control',
                            'placeholder' => __('admin.store.social_media'),
                        ]) !!}
                    </div>

                    <div class="col-sm-6 col-md-6 pt-3">
                        {!! Form::label('social_media_twitter', __('admin.store.twitter')) !!}
                        {!! Form::text('social_media[twitter]', old('social_media[twitter]', $store->social_media['twitter'] ?? ''), [
                            'class' => 'form-control',
                            'placeholder' => __('admin.store.social_media'),
                        ]) !!}
                    </div>

                    <div class="col-sm-6 col-md-6 pt-3">
                        {!! Form::label('social_media_instagram', __('admin.store.instagram')) !!}
                        {!! Form::text('social_media[instagram]', old('social_media[instagram]', $store->social_media['instagram'] ?? ''), [
                            'class' => 'form-control',
                            'placeholder' => __('admin.store.social_media'),
                        ]) !!}
                    </div>

                    <div class="col-sm-6 col-md-6 pt-3">
                        {!! Form::label('social_media_snapchat', __('admin.store.snapchat')) !!}
                        {!! Form::text('social_media[snapchat]', old('social_media[snapchat]', $store->social_media['snapchat'] ?? ''), [
                            'class' => 'form-control',
                            'placeholder' => __('admin.store.social_media'),
                        ]) !!}
                    </div>

                    <div class="col-sm-6 col-md-6 pt-3">
                        {!! Form::label('social_media_tiktok', __('admin.store.tiktok')) !!}
                        {!! Form::text('social_media[tiktok]', old('social_media[tiktok]', $store->social_media['tiktok'] ?? ''), [
                            'class' => 'form-control',
                            'placeholder' => __('admin.store.social_media'),
                        ]) !!}
                    </div>
                </div>

                <div class="form stepper-four row g-3 needs-validation" novalidate="" style="display: none;">

                    <div class="col-sm-12 col-md-12 pt-3">
                        {!! Form::label('image', __('admin.image')) !!}
                        <img height="40" width="40" class=" rounded-circle image-preview-image position-relative"
                            alt="" src="{{ asset($store->getStoreAdmin()->image ?? 'assets/images/user/7.jpg') }}">

                        <input type="file" onchange="changeImage(this, 'image')" class="form-control image"
                            name="image">
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('name', __('admin.name') . ' :* ') !!}
                        {!! Form::text('name', old('name', $store->getStoreAdmin()->name ?? ''), [
                            'class' => 'form-control',
                            $store->id ? '' : 'required',
                            'placeholder' => __('admin.name'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('email', __('admin.email') . ' :* ') !!}
                        {!! Form::email('email', old('email', $store->getStoreAdmin()->email ?? ''), [
                            'class' => 'form-control',
                            $store->id ? '' : 'required',
                            'placeholder' => __('admin.email'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('password', __('admin.password') . ' :* ') !!}
                        {!! Form::password('password', [
                            'class' => 'form-control',
                            $store->id ? '' : 'required',
                            'placeholder' => __('admin.password'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('password_confirmation', __('admin.password_confirmation') . ' :* ') !!}
                        {!! Form::password('password_confirmation', [
                            'class' => 'form-control',
                            $store->id ? '' : 'required',
                            'placeholder' => __('admin.password_confirmation'),
                        ]) !!}
                    </div>


                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('phone', __('admin.phone')) !!}
                        {!! Form::number('phone', old('phone', $store->getStoreAdmin()->phone ?? ''), [
                            'class' => 'form-control',
                            'placeholder' => __('admin.phone'),
                        ]) !!}
                    </div>


                    {{-- <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('active', __('admin.active') . ' :* ') !!}
                        <select name="active" id="active" class="form-select" {{ $store->id ? '' : 'required' }}>

                            <option value="1" {{ optional($store->getStoreAdmin())->active == 1 ? 'selected' : '' }}>
                                {{ __('admin.active') }}
                            </option>
                            <option value="0" {{ optional($store->getStoreAdmin())->active == 0 ? 'selected' : '' }}>
                                {{ __('admin.inactive') }}
                            </option>

                        </select>
                    </div> --}}


                </div>

                {{-- <div class="form stepper-five row g-3 needs-validation" novalidate="" style="display: none;">

                    @foreach( config('translatable.locales') as $locale )
                        <div class="col-md-6 pt-3">
                                {!! Form::label('name-'.$locale, __('admin.name_' . $locale)) !!}
                                {!! Form::text("$locale"."[name]", old("$locale"."[name]",  optional(optional($store->getDefaultBranch())->translate($locale))->name), ['class' => 'form-control' ,'required']) !!}
                        </div>
                    @endforeach

                    @foreach( config('translatable.locales') as $locale )
                        <div class="col-md-6 pt-3">
                                {!! Form::label('address-'.$locale, __('admin.address_' . $locale)) !!}
                                {!! Form::text("$locale"."[address]", old("$locale"."[address]",  optional(optional($store->getDefaultBranch())->translate($locale))->address), ['class' => 'form-control' ]) !!}
                        </div>
                    @endforeach
                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('country',__('admin.country') .' :* ') !!}
                        <select required name="country_id"class="form-control form-select select2"id="">
                            <option disabled hidden selected value="">{{ __('admin.select_item') }}</option>
                            @foreach ($countries as $item)
                                <option {{ optional($store->getDefaultBranch())->country_id == $item->id ?'selected' :'' }} value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('city',__('admin.city') .' :* ') !!}
                        <select required name="city_id"class="form-control form-select select2"id="">
                            <option disabled hidden selected value="">{{ __('admin.select_item') }}</option>
                            @foreach ($cities as $item)
                                <option {{ optional($store->getDefaultBranch())->city_id == $item->id ?'selected' :'' }} value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('lat',__('admin.lat') .' :* ') !!}
                        {!! Form::number('lat',old('lat' ,optional($store->getDefaultBranch())->lat) , ["class"=>'form-control','step' =>'any' ,'required','placeholder'=> __('admin.lat')]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('lng',__('admin.lng') .' :* ') !!}
                        {!! Form::number('lng',old('lng' ,optional($store->getDefaultBranch())->lng) , ["class"=>'form-control','step' =>'any' ,'required','placeholder'=> __('admin.lng')]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('phone',__('admin.phone') .' :* ') !!}
                        {!! Form::number('phone',old('phone' ,optional($store->getDefaultBranch())->phone) , ["class"=>'form-control','step' =>'any' ,'required','placeholder'=> '0123456789']) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('phone_2',__('admin.phone') .' 2 ') !!}
                        {!! Form::number('phone2',old('phone2' ,optional($store->getDefaultBranch())->phone2) , ["class"=>'form-control','step' =>'any' ,'placeholder'=> '0123456789']) !!}
                    </div>

                </div> --}}

            </form>

        </div>

        <div class="wizard-footer d-flex gap-2 justify-content-end p-5">
            <button class="btn btn-outline-primary" id="prevbtn" onclick="backStep()" disabled="">
                {{ __('admin.back') }}</button>
            <button class="btn btn-primary" id="nextbtn" onclick="nextStep()">{{ __('admin.next') }}</button>
        </div>


    </div> <!-- end of card -->



@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('store/assets/css/cuba_assets_css_style.css') }}">
@endsection


@section('js')

    <script src="{{ asset('store/assets/js/form-wizard.js') }}"></script>
    <script src="{{ asset('store/assets/js/form-wizard_image-upload.js') }}"></script>
    <script src="{{ asset('store/assets/js/cuba_assets_js_script.js') }}"></script>

@endsection
