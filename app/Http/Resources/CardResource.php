<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
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
            'type' => 'Cards',
            'attributes' => [
                'subject' => $this->subject,
                'date_issue' => $this->date_issue,
                'duration_issue' => $this->duration_issue,
                'abstract' => $this->abstract,
                'page' => $this->page,
                'comment' => $this->comment,
                'issue' => $this->issue,
                'organization_id' => $this->organization_id
            ]
        ];
    }
}
