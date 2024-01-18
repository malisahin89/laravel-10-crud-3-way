@extends('basicCRUD.layouts')

@section('content')
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
                    <a href="{{ route('basicCrud.create') }}" class="btn btn-success btn-sm my-2"><i
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
                                        <form action="{{ route('basicCrud.destroy', $product->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ route('basicCrud.show', $product->id) }}"
                                                class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                            <a href="{{ route('basicCrud.edit', $product->id) }}"
                                                class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Do you want to delete this product?');"><i
                                                    class="bi bi-trash"></i> Delete</button>
                                        </form>
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
@endsection
