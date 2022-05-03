<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'name',
        'category_id',
        'lecturer_id',
    ];

    function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    function category()
    {
        return $this->belongsTo(Category::class);
    }

    function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
