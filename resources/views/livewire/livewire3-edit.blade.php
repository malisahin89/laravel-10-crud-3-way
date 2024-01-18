<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Product - LiveWire3
                </div>
                <div class="float-end">
                    <a href="{{ route('livewire3Crud.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <form wire:submit.prevent='update'>
                    <div class="mb-3 row">
                        <label for="barcode" class="col-md-4 col-form-label text-md-end text-start">Barcode</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="barcode" name="barcode" wire:model="barcode" autocomplete="off" >
                            @error('barcode') <span>{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" wire:model="name" autocomplete="off" >
                            @error('name') <span>{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="price" class="col-md-4 col-form-label text-md-end text-start">price</label>
                        <div class="col-md-6">
                            <input type="number" step="0.01" class="form-control" wire:model="price" id="price"
                            autocomplete="off" >
                            @error('price') <span>{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="stock" class="col-md-4 col-form-label text-md-end text-start">stock</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" wire:model="stock" id="stock" autocomplete="off" >
                            @error('stock') <span>{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">description</label>
                        <div class="col-md-6">
                            <textarea type="number" class="form-control" wire:model="description" id="description" autocomplete="off"></textarea>
                            @error('description') <span>{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <button type="submit" class="col-md-3 offset-md-5 btn btn-primary btn-submit">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
