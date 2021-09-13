<?php

namespace App\Models\Concerns;

use App\Models\File;

trait HasFiles
{

	public function files(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(File::class);
	}

}
