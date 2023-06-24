<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bills;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index(){
        $total_user = User::count();
        $total_product = Product::count();
        $total_bills = Bills::count();

        $bills = Bills::all();

        $entregadosCount = DB::table('bills')
            ->where('state_id', 3)
            ->count();

        $pendientesCount = DB::table('bills')
            ->where('state_id', 4)
            ->count();

        return view('admin.dashboard.index', compact('bills','total_user','total_product', 'total_bills', 'entregadosCount', 'pendientesCount'));
    }
}
