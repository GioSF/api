<?php

namespace App\Models;

use App\Models\Concerns\HasFiles;
use App\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
	use HasFactory,
		HasFiles,
		HasSlug;

	protected $fillable = ['slug', 'name', 'description', 'google_maps_link'];

	//Eloquent relations

	public function profile()
	{
		return $this->hasOne(\App\Models\ResourceProfile::class);
	}

	//Eloquent relations

	public function journals(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(\App\Models\Journal::class);
	}

	public function cards(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(\App\Models\Card::class);
	}

	public function news(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(\App\Models\News::class);
	}

	public function systemPages(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(\App\Models\SystemPage::class);
	}

	public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
	{
		return $this->belongsToMany(User::class);
	}

	public function systemFunctions()
	{
		return $this->belongsToMany(\App\Models\SystemFunction::class);
	}

}
