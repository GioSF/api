<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonds extends Model
{
    protected $fillable = [
        'title',
        'description',
        'notes',
        'organization_id'
    ];

    protected $casts = [
		'created_at' => 'datetime',
		'updated_at' => 'datetime'
	];

    public function organization() {
        return $this->belongsTo(Organization::class);
    }
}
