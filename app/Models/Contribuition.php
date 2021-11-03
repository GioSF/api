<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribuition extends Model
{
	use HasFactory;

	protected $fillable = [
		'contribuition', 'feedback_admin', 'user_id',
	];

	public function contribuible()
	{
		return $this->morphTo();
	}

	public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}
