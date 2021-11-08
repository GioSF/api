<?php

namespace App\Models;

use App\Models\Concerns\BelongsToOrganization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{

	use HasFactory,
		BelongsToOrganization;

	const JORNAL = 1;
	const REVISTA = 2;
	
	protected $fillable = [
		'localization',
		'title',
		'format_type',
		'printing',
		'idiom',
		'creation_date',
		'end_date'
	];

	protected $casts = [
		'creation_date' => 'datetime',
		'end_date' => 'datetime',
		'created_at' => 'datetime',
		'updated_at' => 'datetime'
	];

	public function issues() {
		return $this->hasMany(Issue::class);
	}
	
}
