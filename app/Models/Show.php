<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    public $fillable = [
        'poster_path',
        'original_title',
        'title',
        'original_language',
        'overview',
        'release_date',
        'status',
    ];


    protected $casts = [
        'release_date' => 'datetime',
    ];
}
