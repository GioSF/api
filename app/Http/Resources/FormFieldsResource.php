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
			'type' => 'FormFields',
			'attributes' => [
				'slug' => $this->slug,
				'label' => $this->label,
				'widget' => $this->widget,
				'ui_data' => $this->ui_data,
				'form_id' => $this->form_id,
			]
		];
	}
}
