@extends('ajaxCrud.layouts')

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Product Information
                    </div>
                    <div class="float-end">
                        <a href="{{ route('ajaxCrud.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ $product->image }}" class="card-img" alt="Ürün Görseli">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-title"><strong>Barcode:</strong> {{ $product->barcode }}</p>
                                <p class="card-title"><strong>Name:</strong> {{ $product->name }}</p>
                                <p class="card-text"><strong>Price:</strong> {{ $product->price }} TL</p>
                                <p class="card-text"><strong>Stok Miktarı:</strong> {{ $product->stock }}</p>
                                <p class="card-text"><strong>Fiyat:</strong> {{ $product->description }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
