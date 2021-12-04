<?php

namespace App\Models;

use App\Models\Concerns\BelongsToOrganization;
use App\Models\Concerns\HasFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	use HasFactory,
		BelongsToOrganization,
		HasFiles;

	const HIDDEN = 1;
	const PUBLISHED = 2;

	protected $fillable = [
		'title',
		'subtitle',
		'content',
		'status'
	];

	protected $casts = [
		'created_at' => 'datetime',
		'updated_at' => 'datetime'
	];


	public function getNewsStatusMap()
	{
		return [
			self::HIDDEN => 'Oculto',
			self::PUBLISHED => 'Publicado',
		];
	}

}
