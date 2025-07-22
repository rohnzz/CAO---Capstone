<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    // Superadmin check removed for now

    public function index()
    {
        $announcements = Announcement::latest()->get();
        return view('announcements.index', compact('announcements'));
    }

    public function create()
    {
        return view('announcements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png,gif|max:20480',
        ]);
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('announcements', 'public');
        }
        Announcement::create([
            'title' => $request->title,
            'body' => $request->body,
            'file_path' => $filePath,
        ]);
        return redirect()->route('announcements.index')->with('success', 'Announcement created successfully.');
    }

    public function edit(Announcement $announcement)
    {
        return view('announcements.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png,gif|max:20480',
        ]);
        $data = $request->only('title', 'body');
        if ($request->hasFile('file')) {
            if ($announcement->file_path) {
                Storage::disk('public')->delete($announcement->file_path);
            }
            $data['file_path'] = $request->file('file')->store('announcements', 'public');
        }
        $announcement->update($data);
        return redirect()->route('announcements.index')->with('success', 'Announcement updated successfully.');
    }

    public function destroy(Announcement $announcement)
    {
        if ($announcement->file_path) {
            Storage::disk('public')->delete($announcement->file_path);
        }
        $announcement->delete();
        return redirect()->route('announcements.index')->with('success', 'Announcement deleted successfully.');
    }
}
