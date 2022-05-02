<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    function assignmentFileAttacks()
    {
        return $this->hasMany(AssignmentFileAttack::class);
    }

    function assignmentSubmissions()
    {
        return $this->hasMany(AssignmentSubmission::class);
    }
}
