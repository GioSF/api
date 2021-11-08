<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
	use HasFactory;

	const ACCEPTED = 1;
	const DENIED = 2;
	const CHANGES_REQUIRED = 3;

	protected $fillable = [
		'contribution', 'feedback_admin', 'feedback_admin_status', 'user_id', 'contribuable_type', 'contribuable_id',
	];

	public function contribuable()
	{
		return $this->morphTo();
	}

	public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function getFeedbackStatusMap()
	{
		return [
			self::ACCEPTED => 'Aprovado',
			self::DENIED => 'Recusado',
			self::CHANGES_REQUIRED => 'Requer alterações'
		];
	}
}
