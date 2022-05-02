<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    function course()
    {
        return $this->belongsTo(Course::class);
    }

    function student()
    {
        return $this->belongsTo(Student::class);
    }

    function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class);
    }
}
