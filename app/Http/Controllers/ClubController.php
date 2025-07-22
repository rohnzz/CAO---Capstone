<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\User;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    // Superadmin check removed for now

    public function index()
    {
        $clubs = Club::with('headCoach')->get();
        return view('clubs.index', compact('clubs'));
    }

    public function create()
    {
        $headCoaches = User::where('role', 'head_coach')->get();
        return view('clubs.create', compact('headCoaches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'head_coach_id' => 'nullable|exists:users,id',
        ]);
        Club::create($request->only('name', 'head_coach_id'));
        return redirect()->route('clubs.index')->with('success', 'Club created successfully.');
    }

    public function edit(Club $club)
    {
        $headCoaches = User::where('role', 'head_coach')->get();
        return view('clubs.edit', compact('club', 'headCoaches'));
    }

    public function update(Request $request, Club $club)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'head_coach_id' => 'nullable|exists:users,id',
        ]);
        $club->update($request->only('name', 'head_coach_id'));
        return redirect()->route('clubs.index')->with('success', 'Club updated successfully.');
    }

    public function destroy(Club $club)
    {
        $club->delete();
        return redirect()->route('clubs.index')->with('success', 'Club deleted successfully.');
    }
}
