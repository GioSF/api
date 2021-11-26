<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
	use HasFactory,
		\App\Models\Concerns\BelongsToUser;

	const ACCEPTED = 1;
	const DENIED = 2;
	const CHANGES_REQUIRED = 3;
	const NOT_REVIEWED = 4;

	protected $fillable = [
		'content', 'feedback_admin', 'feedback_admin_status', 'user_id', 'contribuable_type', 'contribuable_id',
	];

	static public function build(?string $content = null, ?string $feedback_admin = null, ?string $feedback_admin_status = null, ?string $user_id = null): self
	{
		$contribution = self::where('content', $content)
			->where('feedback_admin_status', $feedback_admin_status)
			->first();

		if (!$contribution)
		{
			$contribution = new Contribution;
			$contribution->content = $content;
			$contribution->feedback_admin = $feedback_admin;
			$contribution->feedback_admin_status = $feedback_admin_status;
			$contribution->user_id = $user_id;
		}

		return $contribution;
	}

	public function contribuable()
	{
		return $this->morphTo();
	}

	public function contributions(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(self::class);
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
			self::CHANGES_REQUIRED => 'Requer alterações',
			self::NOT_REVIEWED => 'Aguarda Avaliação',
		];
	}
}
