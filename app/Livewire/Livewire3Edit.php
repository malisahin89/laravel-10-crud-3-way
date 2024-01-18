<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Livewire3Edit extends Component
{

    public $id;
    public $barcode = '';
    public $name = '';
    public $price = '';
    public $stock = '';
    public $description = '';
    public $image = 'public/test.png';

    public function mount($id)
    {
        $kayit = Product::find($id);
        if ($kayit) {
            $this->id = $kayit->id;
            $this->barcode = $kayit->barcode;
            $this->name = $kayit->name;
            $this->price = $kayit->price;
            $this->stock = $kayit->stock;
            $this->description = $kayit->description;
            $this->image = $kayit->image;
        }
    }

    public function update()
    {
        $this->validate([
            'barcode' => 'unique:products,barcode,' . $this->id . '|nullable|string|max:255',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
        ]);

        $kayit = Product::find($this->id);
        if ($kayit) {
            $kayit->update([
                'barcode' => $this->barcode,
                'name' => $this->name,
                'price' => $this->price,
                'stock' => $this->stock,
                'description' => $this->description,
                'image' => $this->image,
            ]);

            session()->flash('message', 'Product updated!');
        }
        $this->mount($this->id);
    }

    public function render()
    {
        return view('livewire.livewire3-edit');
    }

}
