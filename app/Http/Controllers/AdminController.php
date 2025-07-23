<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
//

public function index()
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $userName = $this->getUserName();
    $totalUsers = User::count();
    $role = Auth::user()->role ?? null;

    if ($role === 'superadmin') {
        return view('dashboard.superadmin_dashboard', compact('userName', 'totalUsers'));
    } elseif ($role === 'admin') {
        return view('dashboard.admin_dashboard', compact('userName', 'totalUsers'));
    } else {
        abort(403, 'Unauthorized');
    }
}

    // Method to fetch logged-in user's name or a default message
    private function getUserName(): string
    {
        // Ensure that Auth::user() is correctly handled
        $user = Auth::user();
        return $user ? $user->name : "No user logged in!";
    }


}