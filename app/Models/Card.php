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
		'subject', 'journal_id', 'date_issue', 'duration_issue', 'abstract', 'comment', 'issue', 'organization_id',
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
		'date_issue' => 'datetime',
		'duration_issue' => 'datetime',
	];

	public static function boot()
	{
		// parent::boot();
		// \App\Models\Card::observe(\App\Observers\CardObserver::class);
	}

	//Eloquent relations

	public function journal()
	{
		return $this->belongsTo(\App\Models\Journal::class);
	}

}
