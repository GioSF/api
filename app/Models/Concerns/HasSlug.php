<?php

namespace App\Models\Concerns;

use App\Models\File;
use Illuminate\Database\Eloquent\Builder;

trait HasSlug
{

	public function scopeSlugged(Builder $query, $slug): Builder
	{
		return $query->where('slug', $slug);
	}

}
