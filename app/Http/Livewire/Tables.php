<?php

namespace App\Http\Livewire;

use App\Models\StudentProfile; 
use Livewire\Component;

class Tables extends Component
{
    public function render()
    {
        // Fetch all student profiles
        $students = StudentProfile::all();

        // Pass the data to the view
        return view('livewire.tables', compact('students'));
    }
}
