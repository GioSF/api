<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContribuitionsResource extends JsonResource
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
            'type' => 'Contribuitions',
            'attributes' => [
                'contribuition' => $this->contribuition,
                'feedback_admin' => $this->feedback_admin,
                'user_id' => $this->user_id
            ]
        ];
    }
}
