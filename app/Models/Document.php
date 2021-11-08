<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
	use HasFactory;

	protected $fillable = [
		'file_path', 'content', 'organization_id'
	];

	public function documentable()
	{
		return $this->morphTo();
	}

	public function contributions(): \Illuminate\Database\Eloquent\Relations\MorphMany
	{
		return $this->morphMany(Contribution::class, 'contribuable');
	}
}
