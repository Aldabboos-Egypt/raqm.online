{!! Form::open(['route' => ['dashboard.subcategories.update', $subcategory->id], 'method' => 'post', 'files' => true, 'class' => 'needs-validation was-validated']) !!}
    @method('PATCH')
    <div class="modal-dialog lang-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="creatPackageModalLabel">{{ __('lang.edit') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">

                <div class="col-md-12 col-sm-13 mb-2 pt-2">
                    {!! Form::label('category_id', __('lang.category')) !!}

                    {!! Form::select('category_id', $categories, old('category_id', $subcategory->category_id),
                        ['class' => 'form-control select2']) !!}
                </div>

                <div class="col-md-12 col-sm-12 mb-2 pt-2">
                    {!! Form::label("name", __('lang.name') ) !!}
                    <span class='txt-danger'>*</span>
                    {!! Form::text("name", old("name", $subcategory->name), ['class' => 'form-control', 'required', 'placeholder' => __('lang.description')]) !!}
                </div>

                <div class="col-md-12 col-sm-12 mb-2 pt-2">
                    {!! Form::label("description", __('lang.description') ) !!}
                    <span class='txt-danger'>*</span>
                    {!! Form::text("description", old("description", $subcategory->description), ['class' => 'form-control', 'required', 'placeholder' => __('lang.description')]) !!}
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.close')</button>
                {!! Form::submit(__('lang.save'), ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>

{!! Form::close() !!}



