<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'start_date',
        'deadline',
    ];

    function resource()
    {
        return $this->belongsTo(Resource::class, 'id');
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
