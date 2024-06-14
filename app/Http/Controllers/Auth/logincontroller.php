<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class logincontroller extends Controller
{
    //
    public function showLoginForm(Request $request)
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|regex:/(.*)@gmail\.com/i',
            'password' => 'required|string|min:8',
        ]);

        // Find the user by email
        $user = User::where('email', $request->email)->first();

        // Check if the user exists
        // if(!$user){
        //     return back()->withErrors([
        //         'email' => 'The provided email does not match our records.',
        //     ]);
        // }

        // // Check if the password matches
        // if(!Hash::check($request->password, $user->password)){
        //     return back()->withErrors([
        //         'password' => 'The provided password does not match our records.',
        //     ]);
        // }

        // Check if the user and password matches
        // if(!$user || !Hash::check($request->password, $user->password)){
        //     return back()->withErrors([
        //         'password' => 'The provided credentials do not match our records.',
        //     ]);
        // }

        // // Attempt to log in the user
        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        //     return redirect()->route('login')->with('success', 'Login Successfully!!');
        // } 

        // // If something else fails
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);

        // Check if the user and password matches
        if($user && Hash::check($request->password, $user->password)){
            // Attempt to log in the user
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('dashboard')->with('success', 'Login Successfully!!');
            } 
        } else {

            // If something else fails
            return back()->withErrors([
                'credentials' => 'The provided credentials do not match our records.',
            ]);

        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('success','Logout Successfully!!');
    }


}
