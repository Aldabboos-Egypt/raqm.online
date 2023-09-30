<!-- latest jquery-->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<!-- feather icon js-->
<script src="{{ url('/') }}/assets/js/icons/feather-icon/feather.min.js"></script>
<script src="{{ url('/') }}/assets/js/icons/feather-icon/feather-icon.js"></script>
<!-- scrollbar js-->
<script src="{{ url('/') }}/assets/js/scrollbar/simplebar.js"></script>
<script src="{{ url('/') }}/assets/js/scrollbar/custom.js"></script>
<!-- Sidebar jquery-->
<script src="{{ url('/') }}/assets/js/config.js"></script>
<!-- Plugins JS start-->
<script src="{{ url('/') }}/assets/js/sidebar-menu.js"></script>
<script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{ url('/') }}/assets/js/script.js"></script>
<!-- Plugin used-->
<script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>

{{-- Note PLugin --}}
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script src="{{ asset('assets/js/sweetalert2.js') }}"></script>

{{-- apex-chart --}}
<script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
<script src="{{ asset('assets/js/chart/apex-chart/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>

@yield('js')
@yield('script')
<script>
    function changeImage(element, id) {
        if (element.files && element.files[0]) {
            var reader = new FileReader();
            console.log(id);
            reader.onload = function(e) {
                $('.image-preview-' + id).attr('src', e.target.result);
            }

            reader.readAsDataURL(element.files[0]);
        }
    }


    function changeEventForImage() {
        $(".image").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.image-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
    }


    $(document).on('click', '.btn-modal', function(e) {
        e.preventDefault();
        var container = $(this).data('container');

        $.ajax({
            url: $(this).data('href'),
            dataType: 'html',
            success: function(result) {
                $(container)
                    .html(result)
                    .modal('show');
                    changeEventForImage();
            },
        });
    });

    @if (count($errors) > 0)
        var list = {!! $errors !!};
        var values = '';
        jQuery.each(list, function(key, value) {
            values += value + '\n';
        });
        $(document).ready(function() {
            swal.fire({
                // title: 'Error!',
                text: values,
                icon: 'error'
            });
        });
    @endif
    $(document).ready(function() {
        $('.select2').select2();
        changeEventForImage();
    });

</script>
