<?php

namespace App\Models\Concerns;

use App\Models\File;

trait HasFiles
{

	public function files()
	{
		return $this->morphToMany(File::class, 'fileable');
	}

}
