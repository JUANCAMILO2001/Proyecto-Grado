<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\State;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states = State::all();
        $products = Product::all();
        return view('admin.products.index', compact('states', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::all();
        return view('admin.products.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $fileName = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('imagen', $fileName, 'public');

            $product->imagen = $filePath;
        }
        $product->save();
        Cache::flush();

        return redirect()->route('admin.products.index')->with('info', 'Producto creado con éxito!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        Product::all();
        $states = State::all();
        return view('admin.products.edit', compact('product', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $fileName = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('imagen', $fileName, 'public');

            $product->imagen = $filePath;
            $product->save();
        }

        if ($request->tags) {
            $product->tags()->sync($request->tags);
        }

        Cache::flush();

        return redirect()->route('admin.products.index', $product)->with('info', 'El Producto se ha actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        Cache::flush();
        return redirect()->route('admin.products.index')->with('info', 'El producto se ha eliminó con éxito');
    }
}
