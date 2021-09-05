<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Card extends JsonResource
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
            'type' => 'Card',
            'attributes' => [
                'subject' => $this->subject,
                'date_issue' => $this->date_issue,
                'duration_issue' => $this->duration_issue,
                'abstract' => $this->abstract,
                'comment' => $this->comment,
                'issue' => $this->issue,
                'journal_id' => $this->journal_id,
                'organization_id' => $this->organization_id
            ]
        ];
    }
}