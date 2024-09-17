<?php

namespace App\Models;

use App\Models\Concerns\BelongsToOrganization;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
	use HasFactory,
		BelongsToOrganization;

	protected $fillable = ['slug'];

	static public function build(?string $slug = null, Organization $organization): self
	{
		$form = self::where('slug', $slug)
			->where('organization_id', $organization->id)
			->first();

		if (!$form)
		{
			$form = new self;
			$form->slug = $slug;
			$form->organization_id = $organization->id;
		}

		return $form;
	}

	public function formFields(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(\App\Models\FormField::class);
	}
}
