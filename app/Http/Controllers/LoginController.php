<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $cridentials = $request->only('email', 'password');
        if (Auth::attempt($cridentials)) {
            return redirect('/dashboard');
        } else return back()->withErrors('Whoops! Please try to login again.');
    }
}
