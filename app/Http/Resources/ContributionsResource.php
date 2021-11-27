<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContributionsResource extends JsonResource
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
			'type' => 'Contributions',
			'attributes' => [
				'content' => $this->content,
				'feedback_admin' => $this->feedback_admin,
				'user_id' => $this->user_id,
				'contribuable_type' => $this->contribuable_type,
				'contribuable_id' => $this->contribuable_id,
			]
		];
	}
}
