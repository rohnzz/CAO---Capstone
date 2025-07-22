<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    // Define the custom table name
    protected $table = 'student_profile';  // Assuming the table is named 'student_profile'

    // Define the fillable fields
    protected $fillable = ['firstname', 'lastname', 'email', 'age', 'gender', 'phonenumber', 'category'];

    // If you're using timestamps (created_at, updated_at), make sure it's enabled
    public $timestamps = true;
}
