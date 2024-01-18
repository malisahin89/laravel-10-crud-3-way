<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class Livewire3Create extends Component
{

    public $barcode = '';
    public $name = '';
    public $price = '';
    public $stock = '';
    public $description = '';
    public $image = 'public/test.png';

    public function save(Product $productModel)
    {
        $validated = $this->validate([
            'barcode' => 'unique:products,barcode|nullable|string|max:255',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
        ]);

        $productModel->create($validated);
        $this->reset(); // Reset form fields
        session()->flash('message', 'Product created successfully!');
    }
    public function render()
    {
        return view('livewire.livewire3-create');
    }
}
