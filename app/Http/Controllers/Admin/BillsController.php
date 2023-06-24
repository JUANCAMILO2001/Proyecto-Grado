<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bills;
use App\Models\Product;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = Bills::whereHas('state', function ($query) {
            $query->where('id', 4);
        })->get();
        return view('admin.bills.index', compact('bills'));
    }

    public function entregadosa()
    {
        $bills = Bills::whereHas('state', function ($query) {
            $query->where('id', 3);
        })->get();
        return view('admin.bills.entregadosa', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $products = Product::all();
        $bills = Bills::all();
        $states = State::all();
        return view('admin.bills.create', compact('bills', 'states', 'products', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar si el campo 'products' existe y no es nulo
        if ($request->has('products') && !is_null($request->input('products'))) {
            $bill = Bills::create([
                'method_pay' => $request->method_pay,
                'pay_cacelar' => $request->pay_cacelar,
                'address_bill' => $request->address_bill,
                'checkout_img' => $request->checkout_img,
                'user_id' => $request->user_id,
                'state_id' => $request->state_id,
            ]);

            // Guardar las relaciones de muchos a muchos
            $productData = [];
            foreach ($request->input('products') as $productId => $productInfo) {
                $productData[$productId] = [
                    'name' => $productInfo['name'],
                    'description' => $productInfo['description'],
                    'quantity' => $productInfo['quantity'],
                    'subtotal' => $productInfo['subtotal'],
                    'total' => $productInfo['total'],
                ];
            }
            $bill->products()->attach($productData);

            return redirect()->route('admin.bills.index')->with('info', 'Pedido generado con éxito!');
        } else {
            return redirect()->back()->with('error', 'No se seleccionaron productos válidos.');
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Bills $bill)
    {
        Bills::all();
        return view('admin.bills.show', compact('bill'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bills $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bills $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function charts()
    {
        $salesByDay = DB::table('bills')
            ->join('bill_products', 'bills.id', '=', 'bill_products.bills_id')
            ->select(DB::raw('DATE(bills.created_at) AS date'), DB::raw('SUM(bill_products.total) AS total'))
            ->groupBy('date')
            ->get();

        $balanceByMonth = DB::table('bills')
            ->join('bill_products', 'bills.id', '=', 'bill_products.bills_id')
            ->select(DB::raw('DATE_FORMAT(bills.created_at, "%Y-%m") AS month'), DB::raw('SUM(bill_products.total) AS balance'))
            ->groupBy('month')
            ->get();

        $entregadosCount = DB::table('bills')
            ->where('state_id', 3)
            ->count();

        $pendientesCount = DB::table('bills')
            ->where('state_id', 4)
            ->count();



        return view('admin.bills.charts', compact('salesByDay', 'balanceByMonth', 'entregadosCount', 'pendientesCount'));
    }

}
