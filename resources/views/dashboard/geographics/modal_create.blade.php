{!! Form::open(['route' => 'dashboard.geographics.store', 'method' => 'post', 'files' => true, 'class' => 'needs-validation was-validated']) !!}

    <div class="modal-dialog lang-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="creatPackageModalLabel">{{ __('lang.add') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">

                <div class="col-md-12 col-sm-13 mb-2 pt-2">
                    {!! Form::label("city", __('lang.name') ) !!}
                    <span class='txt-danger'>*</span>
                    {!! Form::text("city", old("city"), ['class' => 'form-control', 'required', 'placeholder' => __('lang.name')]) !!}
                </div>

                <div class="col-md-12 col-sm-12 mb-2 pt-2">
                    {!! Form::label("state", __('lang.state') ) !!}
                    {!! Form::text("state", old("state"), ['class' => 'form-control','placeholder' => __('lang.state')]) !!}
                </div>

                <div class="col-md-12 col-sm-12 mb-2 pt-2">
                    {!! Form::label("country_code", __('lang.country_code') ) !!}
                    <span class='txt-danger'>*</span>
                    {!! Form::text("country_code", old("country_code"), ['class' => 'form-control', 'required', 'placeholder' => __('lang.country_code')]) !!}
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.close')</button>
                {!! Form::submit(__('lang.save'), ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>

{!! Form::close() !!}



