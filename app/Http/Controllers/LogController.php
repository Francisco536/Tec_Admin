<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function logout(Request $request,Redirector $redirect){

                    Auth::guard('web')->logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
        return $redirect->to('/');
    }
}
