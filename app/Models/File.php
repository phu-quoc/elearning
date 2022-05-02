<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'name',
        'file_attack_path',
    ];

    function resource()
    {
        return $this->belongsTo(Resource::class, 'id');
    }
}
