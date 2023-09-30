{!! Form::open(['route' => 'dashboard.adds.store', 'method' => 'post', 'files' => true]) !!}

    <div class="modal-dialog lang-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="creatPackageModalLabel">{{ __('lang.add') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">

                <div class="col-md-12 col-sm-12 mb-2 pt-2">
                    {!! Form::label('image', __('lang.image')) !!}
                    {{-- <span class="text-danger">*</span> --}}
                    <input type="file" name="image" class="form-control image" value="{{ old('image') }}" accept="image/*">
                    <img src="" class="img-thumbnail image-preview" width="30" height="15"/>
                    <div class="invalid-feedback">{{ __('lang.please_enter_valid_value') }}.</div>
                </div>

                @foreach( config('translatable.locales') as $locale )
                    <div class="col-md-6 col-sm-6 mb-2 pt-2">
                        {!! Form::label("{{$locale}}[title]", __('lang.' . $locale . '.title') ) !!}

                        {!! Form::text("$locale"."[title]", old($locale.".title"), ['class' => 'form-control', 'placeholder' => __('lang.' . $locale . '.title')]) !!}
                        <div class="invalid-feedback">{{ __('lang.please_enter_valid_value') }}.</div>
                    </div>
                @endforeach

                @foreach( config('translatable.locales') as $locale )
                    <div class="col-md-6 col-sm-6 mb-2 pt-2">

                        {!! Form::label("{{$locale}}[description]", __('lang.' . $locale . '.description') ) !!}

                        {!! Form::text("$locale"."[description]", old($locale.".description"), ['class' => 'form-control', 'placeholder' => __('lang.' . $locale . '.description')]) !!}
                        <div class="invalid-feedback">{{ __('lang.please_enter_valid_value') }}.</div>
                    </div>
                @endforeach

                <div class="col-md-6 col-sm-12 mb-2 pt-2">
                    {!! Form::label("link", __('lang.link') ) !!}
                    {!! Form::text("link", old("link"), ['class' => 'form-control', 'placeholder' => __('lang.link')]) !!}
                </div>

                <div class="col-md-6 col-sm-12 mb-2 pt-2">
                    {!! Form::label("page", __('lang.page') ) !!}
                    <select name="page" id="page" class="form-select">
                        <option value="">{{ __('lang.choose_page') }}</option>
                        @foreach($pages as $key => $page)
                            <option value="{{ $page }}" {{ old('page') == $page ? 'selected' : '' }}>{{ $page }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 col-sm-12 mb-2 pt-2">
                    {!! Form::label("date_from", __('lang.date_from') ) !!}
                    {!! Form::date("date_from", old("date_from"), ['class' => 'form-control', 'placeholder' => __('lang.date_from')]) !!}
                </div>

                <div class="col-md-6 col-sm-12 mb-2 pt-2">
                    {!! Form::label("date_to", __('lang.date_to') ) !!}
                    {!! Form::date("date_to", old("date_to"), ['class' => 'form-control', 'placeholder' => __('lang.date_to')]) !!}
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.close')</button>
                {!! Form::submit(__('lang.save'), ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>

{!! Form::close() !!}



