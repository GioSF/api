<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

	protected $fillable = ['slug', 'description', 'google_maps_link'];

	//Eloquent relations

	public function profile()
	{
		return $this->hasOne(\App\Models\ResourceProfile::class);
	}

	//Eloquent relations

	public function journals()
	{
		return $this->hasMany(\App\Models\Journal::class);
	}

	public function cards()
	{
		return $this->hasMany(\App\Models\Card::class);
	}

	public function news()
	{
		return $this->hasMany(\App\Models\News::class);
	}

}
