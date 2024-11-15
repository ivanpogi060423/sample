<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products')); 
    }
    
    public function view(Request $request) {
        // initialize the query
        $query = Product::query();
    
        // check for search criteria
        if ($request->filled('search')) {
            $query->where('barcode', 'like', '%' . $request->search . '%')
                  ->orWhere('category', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }
    
        // fetch the products
        $products = $query->get();
        
        return view('products.view', compact('products'));
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        // to validate the request data
        $request->validate([
            'barcode' => 'required|max:12', 
            'category' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'availQuantity' => 'required|numeric'
        ]);

        // create a new product
        Product::create([
            'barcode' => $request->barcode,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'availQuantity' => $request->availQuantity
         ]);

        return redirect('/product');
    }

    // returns the edit form with the existing product data
    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }
    
    // find the product by its ID and update an existing product in the database
    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
       
        $request->validate([
            'barcode' => 'required|max:12',
            'category' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'availQuantity' => 'required|numeric'
        ]);

        $product->update([
            'barcode' => $request->barcode,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'availQuantity' => $request->availQuantity
        ]);
    
        return redirect('/product');
    }
    
    // find the product by its ID and delete a product from a database
    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        
        return redirect('/product');
    }
}
