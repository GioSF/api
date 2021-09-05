<?php

namespace App\Models\Concerns;

use App\Models\Organization;

trait BelongsToOrganization
{

	public function organization(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(Organization::class);
	}

}
