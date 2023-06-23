<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bills;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = Bills::all();
        $states = State::all();
        return view('admin.bills.index', compact('bills', 'states'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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

        return view('admin.bills.charts', compact('salesByDay', 'balanceByMonth'));
    }

}
