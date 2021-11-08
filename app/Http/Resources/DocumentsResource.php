<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentsResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		return [
			'id' => (string) $this->id,
			'type' => 'Documents',
			'attributes' => [
				'file_path' => $this->file_path,
				'content' => $this->content,
				'organization_id' => $this->organization_id
			]
		];
	}
}
