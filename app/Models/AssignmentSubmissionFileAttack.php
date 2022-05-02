<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentSubmissionFileAttack extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'assignment_submitssion_id',
        'name',
        'file_attack_path',
    ];
}
