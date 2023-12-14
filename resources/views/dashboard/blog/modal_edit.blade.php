{!! Form::open([
    'route' => ['dashboard.blogs.update', $blog->id],
    'method' => 'post',
    'files' => true,
    'class' => 'needs-validation was-validated',
]) !!}
@method('PATCH')
<div class="modal-dialog lang-modal">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="creatPackageModalLabel">{{ __('lang.edit') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body row">
            <div class="col-md-12 col-sm-12 mb-2 pt-2">
                {!! Form::label('image', __('lang.image')) !!}
                {{-- <span class="text-danger">*</span> --}}
                <input type="file" name="image" onchange="changeEventForImage()" class="form-control image"
                    value="{{ old('image') }}" accept="image/*">
                <img src="{{ asset($blog->image) }}" class="img-thumbnail image-preview" width="30"
                    height="30" />
                <div class="invalid-feedback">{{ __('lang.please_enter_valid_value') }}.</div>
            </div>

            <div class="col-md-12 col-sm-13 mb-2 pt-2">
                {!! Form::label('blog_category', __('lang.blog_category')) !!}
                <span class='txt-danger'>*</span>
                {!! Form::select('blog_category_id', $categories, old('blog_category_id', $blog->blog_category_id), [
                    'class' => 'form-control',
                    'required',
                ]) !!}
            </div>

            <div class="col-md-12 col-sm-13 mb-2 pt-2">
                {!! Form::label('title', __('lang.title')) !!}
                <span class='txt-danger'>*</span>
                {!! Form::text('title', old('title', $blog->title), [
                    'class' => 'form-control',
                    'required',
                    'placeholder' => __('lang.title'),
                ]) !!}
            </div>

            <div class="col-md-12 col-sm-12 mb-2 pt-2">
                {!! Form::label('description', __('lang.description')) !!}
                <span class='txt-danger'></span>
                {!! Form::textarea('description', old('description', $blog->description), [
                    'class' => 'form-control',
                    'placeholder' => __('lang.description'),
                ]) !!}
            </div>

            <div class="col-md-12 col-sm-13 mb-2 pt-2">
                {!! Form::label('title_ar', __('lang.title_ar')) !!}
                <span class='txt-danger'>*</span>
                {!! Form::text('title_ar', old('title_ar', $blog->title_ar), [
                    'class' => 'form-control',
                    'required',
                    'placeholder' => __('lang.title_ar'),
                ]) !!}
            </div>

            <div class="col-md-12 col-sm-12 mb-2 pt-2">
                {!! Form::label('description_ar', __('lang.description_ar')) !!}
                <span class='txt-danger'></span>
                {!! Form::textarea('description_ar', old('description_ar', $blog->description_ar), [
                    'class' => 'form-control',
                    'placeholder' => __('lang.description_ar'),
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
