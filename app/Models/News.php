<?php

namespace App\Models;

use App\Models\Concerns\BelongsToOrganization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	use HasFactory,
		BelongsToOrganization;

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

	// Eloquent relations

	/**
	 * Get all of the files for the news.
	 */
	public function files()
	{
		return $this->morphToMany(File::class, 'fileable');
	}

	// Add this to fileable class:
	// https://laravel.com/docs/8.x/eloquent-relationships#many-to-many-polymorphic-defining-the-inverse-of-the-relationship

}
