    <div class="row justify-content-center mt-3">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">Product List</div>
                <div class="card-body">
                    <a href="{{ route('livewire3Crud.create') }}" class="btn btn-success btn-sm my-2"><i
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


                                        <a href="{{ route('ajaxCrud.show', $product->id) }}"
                                            class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                        <a href="{{ route('livewire3Crud.edit', $product->id) }}"
                                            class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                        <button class="btn btn-danger btn-sm destroy-btn" onclick="confirm('Are you sure you want to delete {{ $product->name }} ?') || event.stopImmediatePropagation()"
                                            wire:click="delete({{ $product->id }})"><i class="bi bi-trash"></i> Delete</button>




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
