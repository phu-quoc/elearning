<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    function resources()
    {
        return $this->hasMany(Resource::class);
    }

    function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    function course()
    {
        return $this->belongsTo(Course::class);
    }
}
