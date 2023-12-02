{!! Form::open([
    'route' => 'dashboard.blogs.store',
    'method' => 'post',
    'files' => true,
    'class' => 'needs-validation was-validated',
]) !!}

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
                <input type="file" name="image" class="form-control image" value="{{ old('image') }}"
                    accept="image/*">
                <img src="" class="img-thumbnail image-preview" width="30" height="15" />
                <div class="invalid-feedback">{{ __('lang.please_enter_valid_value') }}.</div>
            </div>

            <div class="col-md-12 col-sm-13 mb-2 pt-2">
                {!! Form::label('blog_category', __('lang.blog_category')) !!}
                <span class='txt-danger'>*</span>
                {!! Form::select('blog_category_id', $categories, null, [
                    'class' => 'form-control',
                    'required',
                ]) !!}
            </div>


            <div class="col-md-12 col-sm-13 mb-2 pt-2">
                {!! Form::label('title', __('lang.title')) !!}
                <span class='txt-danger'>*</span>
                {!! Form::text('title', old('title'), [
                    'class' => 'form-control',
                    'required',
                    'placeholder' => __('lang.title'),
                ]) !!}
            </div>

            <div class="col-md-12 col-sm-12 mb-2 pt-2">
                {!! Form::label('description', __('lang.description')) !!}
                <span class='txt-danger'></span>
                {!! Form::textarea('description', old('description'), [
                    'class' => 'form-control',
                    'placeholder' => __('lang.description'),
                ]) !!}
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.close')</button>
            {!! Form::submit(__('lang.save'), ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>

{!! Form::close() !!}
