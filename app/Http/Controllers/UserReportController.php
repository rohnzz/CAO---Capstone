<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserReportController extends Controller
{

public   function showUsers(){

    $getUserInfo = Auth::user();
    $GetName = $getUserInfo->name;
    $GetEmail = $getUserInfo->email;
    $GetUser = User::count();
    $user = user::all();

    return view('reports.user', compact('GetName','GetEmail', 'GetUser', 'user'));
}
}
