<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'head_coach_id',
    ];

    public function headCoach()
    {
        return $this->belongsTo(User::class, 'head_coach_id');
    }
}
