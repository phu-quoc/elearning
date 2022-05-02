<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FolderFileAttack extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'resource_id',
        'name',
        'file_attack_path',
    ];
}
