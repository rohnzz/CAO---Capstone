<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userName = Auth::user()->name ?? 'No user logged in!';
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
} 