@extends('dashboard.layouts.master')
@section('title', __('lang.clinics'))

@section('content')
    @include('dashboard.layouts.includes.breadcrumb', [
        'title' => $clinic->id ? __('lang.edit_clinic') : __('lang.create_clinic'),
        'new_item' =>
            '<li class="breadcrumb-item"><a class="text-muted" href="' .
            route('dashboard.clinics.index') .
            '">' .
            __('lang.clinics') .
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
                    {{-- <div class="step-title">{{ __('admin.main_info') }}</div> --}}
                    <div class="step-bar-left"></div>
                    <div class="step-bar-right"></div>
                </div>
                <div class="tab stepper-two step">
                    <div class="step-circle"><span>2</span></div>
                    {{-- <div class="step-title">{{ __('admin.main_info') }} 2</div> --}}
                    <div class="step-bar-left"></div>
                    <div class="step-bar-right"></div>
                </div>
                <div class="tab stepper-three step">
                    <div class="step-circle"><span>3</span></div>
                    {{-- <div class="step-title">{{ __('admin.store.social_media') }}</div> --}}
                    <div class="step-bar-left"></div>
                    <div class="step-bar-right"></div>
                </div>
                <div class="tab stepper-four step">
                    <div class="step-circle"><span>4</span></div>
                    {{-- <div class="step-title">{{ __('admin.user_info') }}</div> --}}
                    <div class="step-bar-left"></div>
                    <div class="step-bar-right"></div>
                </div>

            </div>

            <form id="msform"
                action="{{ $clinic->clinic_id ? route('dashboard.clinics.update', $clinic->clinic_id) : route('dashboard.clinics.store') }}"
                method="post" enctype="multipart/form-data">

                @csrf

                @if ($clinic->clinic_id)
                    @method('PATCH')
                @endif

                <div class="form stepper-one row g-3 needs-validation custom-input" novalidate="" style="display: flex;">

                    <div class="col-md-12 pt-3">
                        {!! Form::label('category_id', __('lang.category')) !!}
                        {!! Form::select('category_id', $categories, old('category_id', optional($clinic->category())->id ?? ''), [
                            'class' => 'form-control form-select select2_',
                            'placeholder' => __('lang.choose_category'),
                            'onchange' => 'getSubCategories(this)',
                        ]) !!}
                    </div>

                    <div class="col-md-12 pt-3">
                        {!! Form::label('subcategory_id', __('lang.subcategory')) !!}
                        <select class="form-select" name="subcategory_id" id="subcategory_id">
                            <option value="">{{ __('lang.choose_subcategory') }}</option>
                            @foreach ($subCategories as $item)
                                <option class="cat-option cat-{{ $item->category_id }}" value="{{ $item->id }}"
                                    {{ old('subcategory_id') == $item->id || $clinic->subcategory_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-md-6 pt-3">
                        {!! Form::label('url', __('lang.url')) !!}
                        {!! Form::text('url', old('url', $clinic->url), [
                            'class' => 'form-control',
                        ]) !!}
                    </div>

                    <div class="col-md-6 pt-3">
                        {!! Form::label('title', __('lang.title')) !!}
                        {!! Form::text('title', old('title', $clinic->title), [
                            'class' => 'form-control',
                        ]) !!}
                    </div>

                    <div class="col-md-6 pt-3">
                        {!! Form::label('description', __('lang.description')) !!}
                        {!! Form::text('description', old('description', $clinic->description), [
                            'class' => 'form-control',
                        ]) !!}
                    </div>

                    <div class="col-md-6 pt-3">
                        {!! Form::label('price', __('lang.price')) !!}
                        {!! Form::text('price', old('price', $clinic->price), [
                            'class' => 'form-control',
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('address', __('lang.address')) !!}
                        {!! Form::text('address', old('address', $clinic->address), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.address'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('neighborhood', __('lang.neighborhood')) !!}
                        {!! Form::text('neighborhood', old('neighborhood', $clinic->neighborhood), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.neighborhood'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('street', __('lang.street')) !!}
                        {!! Form::text('street', old('street', $clinic->street), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.street'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('city_id', __('lang.city_id')) !!}

                        {!! Form::select('city_id', $cities, old('business_type', $clinic->city_id), [
                            'class' => 'form-control select2',
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('postal_code', __('lang.postal_code')) !!}
                        {!! Form::text('postal_code', old('postal_code', $clinic->postal_code), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.postal_code'),
                        ]) !!}
                    </div>

                </div>

                <div class="form stepper-two row g-3 needs-validation custom-input" novalidate="" style="display: none;">

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('state', __('lang.state')) !!}
                        {!! Form::text('state', old('state', $clinic->state), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.state'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('country_code', __('lang.country_code')) !!}
                        {!! Form::text('country_code', old('country_code', $clinic->country_code), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.country_code'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('website', __('lang.website')) !!}
                        {!! Form::text('website', old('website', $clinic->website), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.website'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('phone', __('lang.phone')) !!}
                        {!! Form::text('phone', old('phone', $clinic->phone), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.phone'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('phone_unformatted', __('lang.phone_unformatted')) !!}
                        {!! Form::text('phone_unformatted', old('phone_unformatted', $clinic->phone_unformatted), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.phone_unformatted'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('claim_this_business', __('lang.claim_this_business')) !!}
                        {!! Form::number('claim_this_business', old('claim_this_business', $clinic->claim_this_business), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.claim_this_business'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('latitude', __('lang.latitude')) !!}
                        {!! Form::number('latitude', old('latitude', $clinic->latitude), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.latitude'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('longitude', __('lang.longitude')) !!}
                        {!! Form::number('longitude', old('longitude', $clinic->longitude), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.longitude'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('location_name', __('lang.location_name')) !!}
                        {!! Form::text('location_name', old('location_name', $clinic->location_name), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.location_name'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('total_score', __('lang.total_score')) !!}
                        {!! Form::number('total_score', old('total_score', $clinic->total_score), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.total_score'),
                        ]) !!}
                    </div>

                </div>

                <div class="form stepper-three row g-3 needs-validation custom-input" novalidate="" style="display: none;">

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('permanently_closed', __('lang.permanently_closed')) !!}
                        {!! Form::number('permanently_closed', old('permanently_closed', $clinic->permanently_closed), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.permanently_closed'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('temporarily_closed', __('lang.temporarily_closed')) !!}
                        {!! Form::number('temporarily_closed', old('temporarily_closed', $clinic->temporarily_closed), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.temporarily_closed'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('place_id', __('lang.place_id')) !!}
                        {!! Form::text('place_id', old('place_id', $clinic->place_id), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.place_id'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('reviews_count', __('lang.reviews_count')) !!}
                        {!! Form::number('reviews_count', old('reviews_count', $clinic->reviews_count), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.reviews_count'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('reviews_one_star', __('lang.reviews_one_star')) !!}
                        {!! Form::number('reviews_one_star', old('reviews_one_star', $clinic->reviews_one_star), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.reviews_one_star'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('reviews_two_star', __('lang.reviews_two_star')) !!}
                        {!! Form::number('reviews_two_star', old('reviews_two_star', $clinic->reviews_two_star), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.reviews_two_star'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('reviews_three_star', __('lang.reviews_three_star')) !!}
                        {!! Form::number('reviews_three_star', old('reviews_three_star', $clinic->reviews_three_star), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.reviews_three_star'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('reviews_four_star', __('lang.reviews_four_star')) !!}
                        {!! Form::number('reviews_four_star', old('reviews_four_star', $clinic->reviews_four_star), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.reviews_four_star'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('reviews_five_star', __('lang.reviews_five_star')) !!}
                        {!! Form::number('reviews_five_star', old('reviews_five_star', $clinic->reviews_five_star), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.reviews_five_star'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('images_count', __('lang.images_count')) !!}
                        {!! Form::number('images_count', old('images_count', $clinic->images_count), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.images_count'),
                        ]) !!}
                    </div>

                </div>

                <div class="form stepper-four row g-3 needs-validation" novalidate="" style="display: none;">


                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('scraped_at', __('lang.scraped_at')) !!}
                        {!! Form::date('scraped_at', old('scraped_at', $clinic->scraped_at), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.scraped_at'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('reserve_table_url', __('lang.reserve_table_url')) !!}
                        {!! Form::text('reserve_table_url', old('reserve_table_url', $clinic->reserve_table_url), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.reserve_table_url'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('google_food_url', __('lang.google_food_url')) !!}
                        {!! Form::text('google_food_url', old('google_food_url', $clinic->google_food_url), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.google_food_url'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('hotel_stars', __('lang.hotel_stars')) !!}
                        {!! Form::number('hotel_stars', old('hotel_stars', $clinic->hotel_stars), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.hotel_stars'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('hotel_description', __('lang.hotel_description')) !!}
                        {!! Form::text('hotel_description', old('hotel_description', $clinic->hotel_description), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.hotel_description'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('check_in_date', __('lang.check_in_date')) !!}
                        {!! Form::date('check_in_date', old('check_in_date', $clinic->check_in_date), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.check_in_date'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('check_out_date', __('lang.check_out_date')) !!}
                        {!! Form::date('check_out_date', old('check_out_date', $clinic->check_out_date), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.check_out_date'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('similar_hotels_nearby', __('lang.similar_hotels_nearby')) !!}
                        {!! Form::text('similar_hotels_nearby', old('similar_hotels_nearby', $clinic->similar_hotels_nearby), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.similar_hotels_nearby'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('opening_hours', __('lang.opening_hours')) !!}
                        {!! Form::text('opening_hours', old('opening_hours', $clinic->opening_hours), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.opening_hours'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('amenities', __('lang.amenities')) !!}
                        {!! Form::text('amenities', old('amenities', $clinic->amenities), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.amenities'),
                        ]) !!}
                    </div>

                    <div class="col-sm-12 col-md-6 pt-3">
                        {!! Form::label('accepts_new_patients', __('lang.accepts_new_patients')) !!}
                        {!! Form::number('accepts_new_patients', old('accepts_new_patients', $clinic->accepts_new_patients), [
                            'class' => 'form-control',
                            'placeholder' => __('lang.accepts_new_patients'),
                        ]) !!}
                    </div>

                </div>

            </form>

        </div>

        <div class="wizard-footer d-flex gap-2 justify-content-end p-5">
            <button class="btn btn-outline-primary" id="prevbtn" onclick="backStep()" disabled="">
                {{ __('lang.back') }}</button>
            <button class="btn btn-primary" id="nextbtn" onclick="nextStep()">{{ __('lang.next') }}</button>
        </div>


    </div> <!-- end of card -->

@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/cuba_assets_css_style.css') }}">
@endsection


@section('js')

    <script src="{{ asset('admin/assets/js/form-wizard.js') }}"></script>
    <script src="{{ asset('admin/assets/js/form-wizard_image-upload.js') }}"></script>
    <script src="{{ asset('admin/assets/js/cuba_assets_js_script.js') }}"></script>

    <script>
        function getSubCategories(categorySelect) {
            $('.cat-option').hide();
            $('.cat-' + $(categorySelect).val()).show();
        }
    </script>
@endsection
