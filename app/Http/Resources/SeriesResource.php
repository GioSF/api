<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SeriesResource extends JsonResource
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
			'type' => 'Series',
			'attributes' => [
				'title' => $this->title,
				'scope' => $this->scope,
				'content' => $this->content,
				'note' => $this->note,
				'volume' => $this->volume,
				'date_range' => $this->date_range,
				'date_start' => $this->date_start,
				'date_end' => $this->date_end,
				'created_at' => $this->created_at,
				'updated_at' => $this->updated_at
			]
		];
    }
}
