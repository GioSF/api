<?php

namespace App\Models;

use App\Models\Concerns\BelongsToOrganization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonds extends Model
{
    use BelongsToOrganization;

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
}
