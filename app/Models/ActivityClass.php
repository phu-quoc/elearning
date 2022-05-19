<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'department_id',
    ];
    protected $table = 'classes';
    
    function department()
    {
        return $this->belongsTo(Department::class);
    }

    function students()
    {
        return $this->hasMany(Student::class);
    }
}
