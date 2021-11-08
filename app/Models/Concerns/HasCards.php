<?php

namespace App\Models\Concerns;

use App\Models\Card;

trait HasCards
{

	public function cards(): \Illuminate\Database\Eloquent\Relations\MorphOne
	{
		return $this->morphOne(Card::class, 'cardable');
	}

	public function cardable()
	{
		return $this->morphTo();
	}
}
