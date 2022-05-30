<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    
    public function createLogin(){
        return view('auth.login');
    }


    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role == "admin") {
                return redirect()->route('event.list')
                ->with(['user'=>Auth::user()]);
            }
            return redirect('/')
            ->with(['user'=>Auth::user()]);
        }
        
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
            
        ])->onlyInput('email');
    }

        /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}