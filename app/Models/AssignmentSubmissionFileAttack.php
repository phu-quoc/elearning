<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentSubmissionFileAttack extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'assignment_submission_id',
        'name',
        'file_attack_path',
    ];

    function assignmentSubmission()
    {
        return $this->belongsTo(AssignmentSubmission::class);
    }
}
