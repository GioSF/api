<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FondsResource extends JsonResource
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
			'type' => 'Fonds',
			'attributes' => [
				'title' => $this->title,
				'description' => $this->description,
				'note' => $this->note,
				'organization_id' => (string) $this->organization_id,
				'created_at' => $this->created_at,
				'updated_at' => $this->updated_at
			]
		];
    }
}
