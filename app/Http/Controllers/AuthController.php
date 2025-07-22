<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
//
public function showLoginForm(){

return view ('authentication.login');

}

public function ShowRegistration(){

return view('authentication.register');
}

public function processRegistration(Request $request){

$request->validate([
'name' => 'required|string|max:255',
'email' => 'required|email|unique:users,email',
'password' => 'required|min:6',
'role' => 'required|string|max:10',
]);

$user = User::create([
'name' => $request->name,
'email' => $request->email,
'password'=> $request->password,
'role' => $request->role,

]);

return redirect()->route('auth.register')->with('success' , 'Successful!');

}

public function processLogin(Request $request){

$request->validate([
'email' => 'required|email',
'password' => 'required',

]);

if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
$request->session()->regenerate();
return redirect()->route('dashboard')->with('success', 'Welcome back!');
}

return back()->with('failed', 'Invalid login credentials.');

}

public function logout()
{
    Auth::logout();  
    session()->flash('success', 'You have been logged out.'); 
    return redirect()->route('login');
}

}