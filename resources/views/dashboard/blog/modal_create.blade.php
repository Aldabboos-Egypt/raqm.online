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
                    'id'=>'description-tinymce-editor',
                ]) !!}
            </div>


            <div class="col-md-12 col-sm-13 mb-2 pt-2">
                {!! Form::label('title_ar', __('lang.title_ar')) !!}
                <span class='txt-danger'>*</span>
                {!! Form::text('title_ar', old('title_ar'), [
                    'class' => 'form-control',
                    'required',
                    'placeholder' => __('lang.title_ar'),
                ]) !!}
            </div>

            <div class="col-md-12 col-sm-12 mb-2 pt-2">
                {!! Form::label('description_ar', __('lang.description_ar')) !!}
                <span class='txt-danger'></span>
                {!! Form::textarea('description_ar', old('description_ar'), [
                    'class' => 'form-control description-tinymce-editor',
                    'placeholder' => __('lang.description_ar'),
                ]) !!}
            </div>


            <div class="col-md-12 pt-3">
                {!! Form::label('sub_category_id', __('lang.subcategory')) !!}
                <select class="form-select" name="sub_category_id" id="sub_category_id">
                    <option value="">{{ __('lang.choose_subcategory') }}</option>
                    @foreach ($subCategories as $item)
                        <option class="cat-option cat-{{ $item->category_id }}" value="{{ $item->id }}">
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 col-sm-13 mb-2 pt-2">
                {!! Form::label('meta_title', __('lang.meta_title')) !!}
                <span class='txt-danger'></span>
                {!! Form::text('meta_title', old('meta_title'), [
                    'class' => 'form-control',
                    'required',
                    'placeholder' => __('lang.meta_title'),
                ]) !!}
            </div>

            <div class="col-md-12 col-sm-12 mb-2 pt-2">
                {!! Form::label('meta_description', __('lang.meta_description')) !!}
                <span class='txt-danger'></span>
                {!! Form::textarea('meta_description', old('meta_description'), [
                    'class' => 'form-control',
                    'placeholder' => __('lang.meta_description'),
                ]) !!}
            </div>
            <div class="col-md-12 col-sm-12 mb-2 pt-2">
                {!! Form::label('meta_keywords', __('lang.meta_keywords')) !!}
                <span class='txt-danger'></span>
                {!! Form::textarea('meta_keywords', old('meta_keywords'), [
                    'class' => 'form-control',
                    'placeholder' => __('lang.meta_keywords'),
                ]) !!}
            </div>

            <div class="col-md-12 col-sm-13 mb-2 pt-2">
                {!! Form::label('meta_title_ar', __('lang.meta_title_ar')) !!}
                <span class='txt-danger'></span>
                {!! Form::text('meta_title_ar', old('meta_title_ar'), [
                    'class' => 'form-control',
                    'required',
                    'placeholder' => __('lang.meta_title_ar'),
                ]) !!}
            </div>

            <div class="col-md-12 col-sm-12 mb-2 pt-2">
                {!! Form::label('meta_description_ar', __('lang.meta_description_ar')) !!}
                <span class='txt-danger'></span>
                {!! Form::textarea('meta_description_ar', old('meta_description_ar'), [
                    'class' => 'form-control',
                    'placeholder' => __('lang.meta_description_ar'),
                ]) !!}
            </div>
            <div class="col-md-12 col-sm-12 mb-2 pt-2">
                {!! Form::label('meta_keywords_ar', __('lang.meta_keywords_ar')) !!}
                <span class='txt-danger'></span>
                {!! Form::textarea('meta_keywords_ar', old('meta_keywords_ar'), [
                    'class' => 'form-control',
                    'placeholder' => __('lang.meta_keywords_ar'),
                ]) !!}
            </div>
            <div class="col-md-12 col-sm-13 mb-2 pt-2">
                {!! Form::label('url', __('lang.url')) !!}
                <span class='txt-danger'></span>
                {!! Form::text('url', old('url'), [
                    'class' => 'form-control',
                    'required',
                    'placeholder' => __('lang.url'),
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




