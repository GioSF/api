<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IssuesResource extends JsonResource
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
			'type' => 'Issues',
			'attributes' => [
				'title' => $this->title,
                'type' => $this->type,
                'periodicity' => $this->periodicity,
                'original_date' => $this->original_date,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'number_pages' => $this->number_pages,
                'pages' => $this->pages,
                'journal_id' => (string) $this->journal_id,
                'journal' => $this->journal,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at
			]
        ];
    }
}
