<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $fillable = [
        'title',
        'scope',
        'content',
        'note',
        'volume',
        'date_range',
        'date_start',
        'date_end'
    ];

    protected $casts = [
        'date_start' => 'datetime',
        'date_end' => 'datetime',
        'created_at' => 'datetime',
		'updated_at' => 'datetime'
    ];
}
