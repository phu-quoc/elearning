<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'topic_id',
        'title',
        'description',
        'start_date',
        'deadline',
    ];
    
}
