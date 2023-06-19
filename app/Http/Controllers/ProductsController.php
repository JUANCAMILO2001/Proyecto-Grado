<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('user.products.index',compact('products'));
    }

    public function cart()
    {
        return view('user.products.cart');
    }
    public function addToCart($id,Request $request)
    {

        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']+= $request->quantity;
        }  else {
            $cart[$id] = [
                "name" => $product->name,
                "imagen" => $product->imagen,
                "pay" => $product->pay,
                "quantity" => $request->quantity,
                "comment" => $request->comment,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'El producto se a añadido al carrito con éxito!');
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
    public function updateComment(Request $request)
    {
        if ($request->id && $request->comment) {
            $cart = session()->get('cart');
            $cart[$request->id]["comment"] = $request->comment;
            session()->put('cart', $cart);
            session()->flash('edit', 'El comentario se edito con éxito!');
        }
    }


    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'El producto se elimino con éxito!!');
        }
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart')->with('success', 'El carrito se ha borrado exitosamente.');
    }



}
