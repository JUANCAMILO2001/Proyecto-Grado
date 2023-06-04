<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class RedirectController extends Controller
{
    public function dashboard(){
        if (auth()->user()->hasRole('admin')){
            return redirect()->route('admin.dashboard');
        }elseif (auth()->user()->hasRole('cocinero')){
            return redirect()->route('admin.dashboard');
        }elseif (auth()->user()->hasRole('usuario')){
            return redirect('/');
        }else{
            Auth::logout();
            return redirect()->route('login');
        }
    }
}
