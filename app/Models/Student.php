<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    function activityClass()
    {
        return $this->belongsTo(ActivityClass::class);
    }

    function assignmentSubmissions()
    {
        return $this->hasMany(AssignmentSubmissions::class);
    }

    function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
