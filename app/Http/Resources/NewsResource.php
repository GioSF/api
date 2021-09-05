<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
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
			'type' => 'News',
			'attributes' => [
				'title' => $this->title,
				'subtitle' => $this->subtitle,
				'content' => $this->content,
				'status' => $this->status,
				'created_at' => $this->created_at,
				'updated_at' => $this->updated_at
			]
		];
	}
}
