<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use App\Models\Concerns\BelongsToOrganization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemPage extends Model
{
	use BelongsToOrganization,
		HasFactory,
		HasSlug;

	protected $fillable = ['slug', 'title', 'content'];

	static public function build(?string $slug = null, ?string $title = null, ?string $content = null)
	{
		$systemPage = self::where('slug', $slug)
			->where('title', $title)
			->first();
		
		if (!$systemPage)
		{
			$systemPage = new self;
			$systemPage->slug = $slug;
			$systemPage->title = $title;
			$systemPage->content = $content;
		}

		return $systemPage;
	}


}
