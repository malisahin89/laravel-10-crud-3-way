<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AjaxCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ajaxCrud.index', [
            'products' => Product::all(),
            // 'products' => Product::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ajaxCrud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        // Form validation
        // Formdan gelmesi istenenleri kontrol etme
        $validator = $request->validate([
            'barcode' => 'unique:products,barcode|nullable|string|max:255',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
        ]);

        // Create new product
        // Yeni ürün oluştur
        $product = new Product([
            'barcode' => $request->input('barcode'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'description' => $request->input('description'),
            // 'image' => $request->input('image'),
            'image' => 'public/test.png',
        ]);

        // Save to DB
        // Veritabanına kaydet
        $product->save();

        return response()->json(['success' => 'Product created successfully.']);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Product::where('id', $id)->first();
        if($data!=null){
            return view('ajaxCrud.show', [
                'product' => $data,
            ]);
        }else{
            return redirect(route('ajaxCrud.index'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('ajaxCrud.edit', [
            'product' => Product::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $product = Product::where('id', $id)->first();

        $request->validate([
            'barcode' => 'unique:products,barcode,' . $id . '|nullable|string|max:255',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',

        ]);

        // Ürün bilgilerini güncelle
        $product->update([
            'barcode' => $request->input('barcode'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'description' => $request->input('description'),
            'image' => $request->input('image'),

        ]);

        // return redirect()->back()->withSuccess('Product is updated successfully.');
        return response()->json(['success' => 'Product created successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return response()->json(['success' => 'Product is deleted successfully.']);
    }
}
