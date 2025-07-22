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
        // Fetch user info using getUserName method
        $userName = $this->getUserName();
        
        // Count total users
        $totalUsers = User::count();

        // Pass the data to the view
        return view('admin.dashboard', compact('userName', 'totalUsers'));
    }

    // Method to fetch logged-in user's name or a default message
    private function getUserName(): string
    {
        // Ensure that Auth::user() is correctly handled
        $user = Auth::user();
        return $user ? $user->name : "No user logged in!";
    }


}