<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
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
			'id' => $this->id,
			'type' => 'File',
			'attributes' => [
				'title' => $this->title,
				'description' => $this->description,
				'filepath' => $this->filepath,
				'hash_name' => $this->hash_name
			]
		];
	}
}
