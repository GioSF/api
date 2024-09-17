<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
	use HasFactory;

	const TEXT_WIDGET = 1;
	const TEXT_AREA_WIDGET = 2;
	const DATETIME_WIDGET = 3;
	const SELECT_WIDGET = 4;
	const FILE_UPDATE_WIDGET = 5;

	protected $fillable = ['slug', 'label', 'widget', 'ui_data'];
	
	protected $casts = [
		'ui_data' => 'array'
	];

	static public function build(?string $slug = null, ?string $label = null, ?string $widget = null, ?string $form_id = null): self
	{
		$formField = self::where('slug', $slug)
						->where('label', $label)
						->where('widget', $widget)
						->where('form_id', $form_id)
						->first();

		if (!$formField)
		{
			$formField = new self;
			$formField->slug = $slug;
			$formField->label = $label;
			$formField->widget = $widget;
			$formField->form_id = $form_id;
		}

		return $formField;
	}

}
