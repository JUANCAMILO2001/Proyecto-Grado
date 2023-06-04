<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        $total_user = User::count();
        $total_product = Product::count();
        return view('admin.dashboard.index', compact('total_user','total_product'));
    }
}
