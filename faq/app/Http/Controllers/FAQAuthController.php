<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FAQAuthController extends Controller
{


    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
   
    public function authenticate(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('admin');
        } else {echo "not ok";}
    }

    public function logout()
    {
        
        if (Auth::check()) {
        	echo "string";
            Auth::logout();
            return redirect()->route('user'); 
        }
        
    }

}
