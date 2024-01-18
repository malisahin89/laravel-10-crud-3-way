@extends('basicCrud.layouts')

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">

            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Add New Product
                    </div>
                    <div class="float-end">
                        <a href="{{ route('basicCrud.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('basicCrud.store') }}" method="post">
                        @csrf

                        <div class="mb-3 row">
                            <label for="barcode" class="col-md-4 col-form-label text-md-end text-start">Barcode</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('barcode') is-invalid @enderror"
                                    id="barcode" name="barcode" value="{{ old('barcode') }}">
                                @if ($errors->has('barcode'))
                                    <span class="text-danger">{{ $errors->first('barcode') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="price" class="col-md-4 col-form-label text-md-end text-start">Price</label>
                            <div class="col-md-6">
                                <input type="number" step="0.01"
                                    class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                                    value="{{ old('price') }}">
                                @if ($errors->has('price'))
                                    <span class="text-danger">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="stock" class="col-md-4 col-form-label text-md-end text-start">Stock</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                    id="stock" name="stock" value="{{ old('stock') }}">
                                @if ($errors->has('stock'))
                                    <span class="text-danger">{{ $errors->first('stock') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-end text-start">Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Product">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
