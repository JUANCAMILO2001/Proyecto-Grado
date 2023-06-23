<?php

namespace App\Http\Controllers;

use App\Models\Bills;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BillsController extends Controller
{

    public function index()
    {
        $bills = Bills::all();
        return view('user.bills.pedidos', compact('bills'));
    }

    public function checkCartuser(Bills $bill,$id){
        // Obtener el usuario autenticado
        $user = auth()->user();

        // Buscar la preorden asociada al usuario actual
        $bill = Bills::where('id', $id)
            ->where('user_id', $user->id)
            ->first();

        // Verificar si se encontró la preorden
        if ($bill) {
            // Mostrar la vista solo con la preorden del usuario actual
            return view('user.bills.checks-pays', compact('bill'));
        } else {
            // Preorden no encontrada para el usuario actual, mostrar un error o redirigir
            return abort(403);
        }
    }

    public function checkCart(Request $request)
    {

        $bill = Bills::create([
            'pay_cacelar' =>  $request->pay_cacelar,
            'address_bill' => $request->address_bill,
            'user_id' => $request->user_id,
            'method_pay' => $request->method_pay,
            'checkout_img' => $request->checkout_img,
            'state_id' => 4,
        ]);
        // Verificar si se ha subido una imagen
        if ($request->hasFile('checkout_img')) {
            $file = $request->file('checkout_img');
            $fileName = date('YmdHis') . "." .  $file->getClientOriginalName();
            $filePath = $file->storeAs('checkout', $fileName, 'public');
            $bill->checkout_img = $filePath;
        }
        // Asociar los productos a la factura en la tabla de detalle
        foreach (session('cart') as $id => $details) {
            $product = Product::find($id);
            $bill->products()->attach($product, [
                'name' => $details['name'],
                'quantity' => $details['quantity'],
                'description' => $details['comment'],
                'subtotal' => $details['pay'] * $details['quantity'],
                'total' => $details['pay'] * $details['quantity'],
            ]);
        }

        Session::forget('cart');


        return redirect()->route('users.checkpays', $bill->id)->with('success', 'El pedido se generó correctamente.');
    }



}
