<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'degree_id',
        'department_id',
        
    ];
    
    function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    function department()
    {
        return $this->belongsTo(Department::class);
    }

    function degree()
    {
        return $this->belongsTo(Degree::class);
    }

    function courses()
    {
        return $this->hasMany(Course::class);
    }
}
