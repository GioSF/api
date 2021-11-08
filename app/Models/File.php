<?php

namespace App\Models;

use App\Models\News;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class File extends Model
{
	use HasFactory;

	protected $fillable = [
		'title', 'description', 'filepath', 'hash_name',
	];

	static public function build(?string $title = null, ?string $description = null, ?string $filepath = null, ?string $hashName = null): self
	{
		$file = self::where('title', $title)
			->where('description', $description)
			->where('filepath', $filepath)
			->first();

		if (!$file)
		{
			$file = new File;
			$file->title = $title;
			$file->description = $description;
			$file->filepath = $filepath;
			$file->hash_name = Hash::make($filepath);
		}

		return $file;
	}

	public function fileable()
	{
		return $this->morphTo();
	}

	public function news()
	{
		return $this->morphedByMany(News::class, 'fileable');
	}

	public function organizations()
	{
		return $this->morphedByMany(Organization::class, 'fileable');
	}

	public function users()
	{
		return $this->morphedByMany(User::class, 'fileable');
	}

}
