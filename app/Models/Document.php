<?php

namespace App\Models;

use App\Models\Concerns\HasCards;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
	use HasFactory,
		HasCards;

	protected $fillable = [
		'file_path', 'content', 'organization_id'
	];

	static public function build(?string $content = null, ?string $file_path = null, Organization $organization = null): self
	{
		$document = self::where('content', $content)
			->where('file_path', $file_path)
			->where('organization', $organization->id)
			->first();

		if (!$document)
		{
			$document = new File;
			$document->content = $content;
			$document->file_path = $file_path;
			$document->organization = $organization->id;
		}

		return $document;
	}

	
	public function documentable()
	{
		return $this->morphTo();
	}

	public function contributions(): \Illuminate\Database\Eloquent\Relations\MorphMany
	{
		return $this->morphMany(Contribution::class, 'contribuable');
	}
}
