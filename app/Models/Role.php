<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	use HasFactory;

	protected $fillable = ['slug', 'title', 'description'];

	static public function build(?string $slug = null, ?string $title = null, ?string $description = null)
	{
		$role = self::where('slug', $slug)
			->where('title', $title)
			->first();
		
		if (!$role)
		{
			$role = new self;
			$role->slug = $slug;
			$role->title = $title;
			$role->description = $description;
		}

		return $role;
	}

	/*
	* The users that belong to this role
	*/
	public function users()
	{
		return $this->belongsToMany(User::class);
	}
}
