<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HeadCoachController extends Controller
{
    public function index()
    {
        $headCoaches = User::where('role', 'head_coach')->get();
        return view('head_coaches.index', compact('headCoaches'));
    }

    public function create()
    {
        return view('head_coaches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'head_coach',
        ]);
        return redirect()->route('head-coaches.index')->with('success', 'Head Coach created successfully.');
    }

    public function edit(User $headCoach)
    {
        return view('head_coaches.edit', compact('headCoach'));
    }

    public function update(Request $request, User $headCoach)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $headCoach->id,
            'password' => 'nullable|min:6|confirmed',
        ]);
        $data = $request->only('name', 'email');
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }
        $headCoach->update($data);
        return redirect()->route('head-coaches.index')->with('success', 'Head Coach updated successfully.');
    }

    public function destroy(User $headCoach)
    {
        $headCoach->delete();
        return redirect()->route('head-coaches.index')->with('success', 'Head Coach deleted successfully.');
    }
}
