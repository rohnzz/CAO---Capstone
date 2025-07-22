<?php

namespace App\Http\Controllers;

use App\Models\StudentProfile; 
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    public function showStudents()
    {
        // Fetch all student profiles
        $students = StudentProfile::all();

        // Pass the data to the view
        return view('reports.students', compact('students'));
    }
}
