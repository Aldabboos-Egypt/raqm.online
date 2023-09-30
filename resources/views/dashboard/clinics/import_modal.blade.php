<!-- Modal -->

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="table-model-import">{{ __('lang.import') }} : <span
                    class="fw-bold text-primary"></span></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
        </div>
        <form action="{{ route('dashboard.clinics.import') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="modal-body">

                <div class="mb-3 col-sm-12  pt-3">
                    {!! Form::label('file', __('lang.choose_excel_file') . ' :* ') !!}
                    {!! Form::file('file', [
                        'class' => 'form-control mt-2',
                        'required',
                        'accept' => '.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel',
                    ]) !!}
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">{{ __('lang.close') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('lang.save') }}</button>
            </div>
        </form>
    </div>
</div>

