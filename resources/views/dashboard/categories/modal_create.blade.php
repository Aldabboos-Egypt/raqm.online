{!! Form::open(['route' => 'dashboard.categories.store', 'method' => 'post', 'files' => true, 'class' => 'needs-validation was-validated']) !!}

    <div class="modal-dialog lang-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="creatPackageModalLabel">{{ __('lang.add') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">

                <div class="col-md-12 col-sm-13 mb-2 pt-2">
                    {!! Form::label("name", __('lang.name') ) !!}
                    <span class='txt-danger'>*</span>
                    {!! Form::text("name", old("name"), ['class' => 'form-control', 'required', 'placeholder' => __('lang.name')]) !!}
                </div>

                <div class="col-md-12 col-sm-12 mb-2 pt-2">
                    {!! Form::label("description", __('lang.description') ) !!}
                    <span class='txt-danger'>*</span>
                    {!! Form::text("description", old("description"), ['class' => 'form-control', 'required', 'placeholder' => __('lang.description')]) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.close')</button>
                {!! Form::submit(__('lang.save'), ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>

{!! Form::close() !!}



