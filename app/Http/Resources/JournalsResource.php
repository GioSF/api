<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class JournalsResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request)
	{
		return [
			'id' => (string) $this->id,
			'type' => 'Journals',
			'attributes' => [
				'localization' => $this->localization,
				'title' => $this->title,
				'printing' => $this->printing,
				'idiom' => $this->idiom,
				'creation_date' => $this->creation_date,
				'end_date' => $this->end_date,
				'issues' => $this->issues,
				'created_at' => $this->created_at,
				'updated_at' => $this->updated_at
			]
		];
	}
}
