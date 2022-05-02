<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchollYear extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'school_year',
    ];
}
