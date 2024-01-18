@extends('ajaxCrud.layouts')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Add New Product - ajax
                    </div>
                    <div class="float-end">
                        <a href="{{ route('ajaxCrud.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form id="ajaxCrudForm" enctype="multipart/form-data">
                        @csrf

                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>

                        <div class="mb-3 row">
                            <label for="barcode" class="col-md-4 col-form-label text-md-end text-start">Barcode</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="barcode" name="barcode">
                                <span class="text-danger" id="barcode-error" style="display:none"></span>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="name" name="name">
                                <span class="text-danger" id="name-error" style="display:none"></span>
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="price" class="col-md-4 col-form-label text-md-end text-start">Price</label>
                            <div class="col-md-6">
                                <input type="number" step="0.01" class="form-control" id="price" name="price">
                                <span class="text-danger" id="price-error" style="display:none"></span>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="stock" class="col-md-4 col-form-label text-md-end text-start">Stock</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" id="stock" name="stock">
                                <span class="text-danger" id="stock-error" style="display:none"></span>
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-end text-start">Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="description" name="description"></textarea>
                                <span class="text-danger" id="description-error" style="display:none"></span>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <button class="col-md-3 offset-md-5 btn btn-primary btn-submit">Add Product</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function resetForm() {
            $('#ajaxCrudForm .is-invalid').removeClass('is-invalid');
            $('.text-danger').text('').css('display', 'none');
            $('#ajaxCrudForm .print-error-msg ul').html('');
            $('#ajaxCrudForm .print-error-msg').css('display', 'none');
            $('#ajaxCrudForm')[0].reset();
        }

        $(".btn-submit").click(function(e) {

            e.preventDefault();
            var formData = $('#ajaxCrudForm').serialize();

            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, //csrf token
                url: "{{ route('ajaxCrud.store') }}",
                data: formData,
                success: (response) => {
                    var msg = response.success;

                    Swal.fire({
                        icon: 'success',
                        title: msg,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    resetForm();
                },
                error: function(response) {
                    $('#ajaxCrudForm').find(".print-error-msg").find("ul").html('');
                    $('#ajaxCrudForm').find(".print-error-msg").css('display', 'block');
                    $.each(response.responseJSON.errors, function(key, value) {
                        $('#ajaxCrudForm').find(".print-error-msg").find("ul").append('<li>' +
                            value + '</li>');
                        $('#' + key).addClass('is-invalid');

                        $('#' + key + '-error').text(value.join(', '));
                        $('#' + key + '-error').css('display', 'block');
                    });
                }
            });

        });
    </script>
@endsection
