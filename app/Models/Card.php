<?php

namespace App\Models;

use App\Models\Concerns\BelongsToOrganization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
	use HasFactory,
		BelongsToOrganization;

	protected $fillable = [
		'subject', 'date_issue', 'duration_issue', 'abstract', 'comment', 'issue',
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
		'date_issue' => 'datetime',
		'duration_issue' => 'datetime',
	];


	//Eloquent relations

	public function cardable()
	{
		return $this->morphTo();
	}

}
