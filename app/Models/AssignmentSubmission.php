<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentSubmission extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'assignment_id',
        'student_id',
        'status',
        'point',
    ];

    function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    function student()
    {
        return $this->belongsTo(Student::class);
    }

    function assignmentSubmissionFileAttacks()
    {
        return $this->hasMany(AssignmentSubmissionFileAttack::class);
    }
}
