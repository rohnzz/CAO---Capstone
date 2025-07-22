<?php

namespace App\Http\Controllers;

use App\Models\MemberApplication;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MemberApplicationController extends Controller
{
    // Only logged-in users can apply, management open to all authenticated users for now
    public function __construct()
    {
        $this->middleware('auth');
    }

    // User: Show application form
    public function create()
    {
        $clubs = Club::all();
        return view('member_applications.create', compact('clubs'));
    }

    // User: Store application
    public function store(Request $request)
    {
        $request->validate([
            'club_id' => 'required|exists:clubs,id',
            'reason' => 'required|string',
            'file' => 'nullable|file|max:20480',
        ]);
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('member_applications', 'public');
        }
        MemberApplication::create([
            'user_id' => Auth::id(),
            'club_id' => $request->club_id,
            'reason' => $request->reason,
            'file_path' => $filePath,
            'status' => 'pending',
        ]);
        return redirect()->route('member-applications.create')->with('success', 'Application submitted!');
    }

    // Management: List all applications
    public function index()
    {
        $applications = MemberApplication::with(['club', 'user'])->latest()->get();
        return view('member_applications.index', compact('applications'));
    }

    // Management: Update status
    public function update(Request $request, MemberApplication $memberApplication)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);
        $memberApplication->update(['status' => $request->status]);
        return redirect()->route('member-applications.index')->with('success', 'Status updated.');
    }

    // Management: Delete application
    public function destroy(MemberApplication $memberApplication)
    {
        if ($memberApplication->file_path) {
            Storage::disk('public')->delete($memberApplication->file_path);
        }
        $memberApplication->delete();
        return redirect()->route('member-applications.index')->with('success', 'Application deleted.');
    }
}
