<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemFunction extends Model
{
	use HasFactory;

	protected $fillable = ['name', 'slug', 'description', 'parent_system_function'];

	static public function build(?string $name = null, ?string $slug = null, ?string $description = null, ?string $parentSystemFunction = null)
	{
		$systemFunction = self::where('name', $name)
			->where('description', $description)
			->where('parent_system_function', $parentSystemFunction)
			->first();

		if (!$systemFunction)
		{
			$systemFunction = new self;
			$systemFunction->name = $name;
			$systemFunction->slug = $slug;
			$systemFunction->description = $description;
			$systemFunction->parent_system_function = $parentSystemFunction;
		}

		return $systemFunction;
	}

	public function organizations()
	{
		return $this->belongsToMany(\App\Models\Organization::class);
	}
}
