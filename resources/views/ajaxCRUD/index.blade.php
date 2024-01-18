@extends('ajaxCrud.layouts')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">Product List</div>
                <div class="card-body">
                    <a href="{{ route('ajaxCrud.create') }}" class="btn btn-success btn-sm my-2"><i
                            class="bi bi-plus-circle"></i> Add New Product</a>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">barcode</th>
                                <th scope="col">name</th>
                                <th scope="col">price</th>
                                <th scope="col">stock</th>
                                <th scope="col">description</th>
                                <th scope="col">image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $product->barcode }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->image }}</td>
                                    <td>
                                        {{-- <form action="{{ route('ajaxCrud.destroy', $product->id) }}" method="post"> --}}


                                        <a href="{{ route('ajaxCrud.show', $product->id) }}"
                                            class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                        <a href="{{ route('ajaxCrud.edit', $product->id) }}"
                                            class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                        <button class="btn btn-danger btn-sm destroy-btn" data-id="{{ $product->id }}"><i
                                                class="bi bi-trash"></i> Delete</button>


                                    </td>
                                </tr>
                            @empty
                                <td colspan="8">
                                    <span class="text-danger">
                                        <strong>No Product Found in Your Stock!</strong>
                                    </span>
                                </td>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- {{ $products->links() }} --}}

                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var deleteButtons = document.querySelectorAll('.destroy-btn');

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var productID = button.dataset.id;
                    var link = '{{ route('ajaxCrud.destroy', 'malisahin89') }}';

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Do you really want to delete this item?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Silme işlemi burada gerçekleştirilebilir
                            // AJAX ile DELETE isteği gönder
                            $.ajax({
                                type: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                        .attr('content')
                                }, //csrf token
                                url: link.replace("malisahin89", productID),
                                success: function(response) {
                                    // Silme başarılı olduğunda SweetAlert ile mesaj göster
                                    Swal.fire({
                                        title: 'Deleted!',
                                        text: response.success,
                                        icon: 'success',
                                    });

                                    // İsteği gönderen elemanı DOM'dan kaldırabilirsiniz
                                    button.closest('tr').remove();
                                },
                                error: function(error) {
                                    console.log('Bir hata oluştu:', error);
                                }
                            });
                        }
                    });


                });
            });
        });
    </script>
@endsection
