<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class Livewire3index extends Component
{


    public function delete(Product $product){
        $product->delete();
    }

    public function render()
    {
        return view('livewire.livewire3-index',
        [
            'products' => Product::all()
        ]
        );
    }
}
