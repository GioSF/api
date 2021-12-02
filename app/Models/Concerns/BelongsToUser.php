<?php

namespace App\Models\Concerns;

use App\Models\User;

trait BelongsToUser
{

	public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function belongsToUser(User $user): bool
	{
		return (bool) $this->user_id == $user->id;
	}

}
