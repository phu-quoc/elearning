<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentFileAttack extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'name',
        'assignment_id',
        'file_attack_path',
    ];

    function assignments()
    {
        return $this->belongsTo(Assignment::class);
    }
}
