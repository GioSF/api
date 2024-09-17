<?php

namespace Database\Seeders;

use App\Models\Form;
use App\Models\FormField;
use Illuminate\Database\Seeder;

class FormFieldSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */

	const FIELDS = 
		[
			[
				'slug' => 'subject',
				'label' => 'Assunto',
				'widget' => FormField::TEXT_WIDGET,
				'ui_data' => '',
				'form_id' => '1',
			],
			[
				'slug' => 'date_document',
				'label' => 'Data da edicão',
				'widget' => FormField::DATETIME_WIDGET,
				'ui_data' => '',
				'form_id' => '1',
			],
			[
				'slug' => 'duration_document',
				'label' => 'Duração',
				'widget' => FormField::DATETIME_WIDGET,
				'ui_data' => '',
				'form_id' => '1',
			],
			[
				'slug' => 'abstract',
				'label' => 'Resumo',
				'widget' => FormField::TEXT_AREA_WIDGET,
				'ui_data' => '',
				'form_id' => '1',
			],
			[
				'slug' => 'comment',
				'label' => 'Comentário',
				'widget' => FormField::TEXT_AREA_WIDGET,
				'ui_data' => '',
				'form_id' => '1',
			],
			[
				'slug' => 'document',
				'label' => 'Documento',
				'widget' => FormField::SELECT_WIDGET,
				'ui_data' => '',
				'form_id' => '1',
			],
			[
				'slug' => 'content',
				'label' => 'Conteúdo',
				'widget' => FormField::TEXT_AREA_WIDGET,
				'ui_data' => '',
				'form_id' => '2',
			],
			[
				'slug' => 'feedback-admin',
				'label' => 'Comentário do editor',
				'widget' => FormField::TEXT_AREA_WIDGET,
				'ui_data' => '',
				'form_id' => '2',
			],
			[
				'slug' => 'feedback-admin-status',
				'label' => 'Status da avaliação do editor',
				'widget' => FormField::SELECT_WIDGET,
				'ui_data' => '',
				'form_id' => '2',
			],
			[
				'slug' => 'title',
				'label' => 'Título da notícia',
				'widget' => FormField::TEXT_WIDGET,
				'ui_data' => '',
				'form_id' => '3',
			],
			[
				'slug' => 'subtitle',
				'label' => 'Subtítulo da notícia',
				'widget' => FormField::TEXT_WIDGET,
				'ui_data' => '',
				'form_id' => '3',
			],
			[
				'slug' => 'content',
				'label' => 'Conteúdo',
				'widget' => FormField::TEXT_AREA_WIDGET,
				'ui_data' => '',
				'form_id' => '3',
			],
			[
				'slug' => 'status',
				'label' => 'Status',
				'widget' => FormField::SELECT_WIDGET,
				'ui_data' => '',
				'form_id' => '3',
			],
			[
				'slug' => 'name',
				'label' => 'Nome',
				'widget' => FormField::TEXT_WIDGET,
				'ui_data' => '',
				'form_id' => '4',
			],
			[
				'slug' => 'email',
				'label' => 'Email',
				'widget' => FormField::TEXT_WIDGET,
				'ui_data' => '',
				'form_id' => '4',
			],
			[
				'slug' => 'password',
				'label' => 'Senha',
				'widget' => FormField::TEXT_WIDGET,
				'ui_data' => '',
				'form_id' => '4',
			],
			[
				'slug' => 'subject',
				'label' => 'Assunto',
				'widget' => FormField::TEXT_WIDGET,
				'ui_data' => '',
				'form_id' => '5',
			],
			[
				'slug' => 'date_document',
				'label' => 'Data da edicão',
				'widget' => FormField::DATETIME_WIDGET,
				'ui_data' => '',
				'form_id' => '5',
			],
			[
				'slug' => 'duration_document',
				'label' => 'Duração',
				'widget' => FormField::DATETIME_WIDGET,
				'ui_data' => '',
				'form_id' => '5',
			],
			[
				'slug' => 'abstract',
				'label' => 'Resumo',
				'widget' => FormField::TEXT_AREA_WIDGET,
				'ui_data' => '',
				'form_id' => '5',
			],
			[
				'slug' => 'comment',
				'label' => 'Comentário',
				'widget' => FormField::TEXT_AREA_WIDGET,
				'ui_data' => '',
				'form_id' => '5',
			],
			[
				'slug' => 'document',
				'label' => 'Documento',
				'widget' => FormField::SELECT_WIDGET,
				'ui_data' => '',
				'form_id' => '5',
			],
			[
				'slug' => 'content',
				'label' => 'Conteúdo',
				'widget' => FormField::TEXT_AREA_WIDGET,
				'ui_data' => '',
				'form_id' => '6',
			],
			[
				'slug' => 'feedback-admin',
				'label' => 'Comentário do editor',
				'widget' => FormField::TEXT_AREA_WIDGET,
				'ui_data' => '',
				'form_id' => '6',
			],
			[
				'slug' => 'feedback-admin-status',
				'label' => 'Status da avaliação do editor',
				'widget' => FormField::SELECT_WIDGET,
				'ui_data' => '',
				'form_id' => '6',
			],
			[
				'slug' => 'title',
				'label' => 'Título da notícia',
				'widget' => FormField::TEXT_WIDGET,
				'ui_data' => '',
				'form_id' => '7',
			],
			[
				'slug' => 'subtitle',
				'label' => 'Subtítulo da notícia',
				'widget' => FormField::TEXT_WIDGET,
				'ui_data' => '',
				'form_id' => '7',
			],
			[
				'slug' => 'content',
				'label' => 'Conteúdo',
				'widget' => FormField::TEXT_AREA_WIDGET,
				'ui_data' => '',
				'form_id' => '7',
			],
			[
				'slug' => 'status',
				'label' => 'Status',
				'widget' => FormField::SELECT_WIDGET,
				'ui_data' => '',
				'form_id' => '7',
			],
			[
				'slug' => 'name',
				'label' => 'Nome',
				'widget' => FormField::TEXT_WIDGET,
				'ui_data' => '',
				'form_id' => '8',
			],
			[
				'slug' => 'email',
				'label' => 'Email',
				'widget' => FormField::TEXT_WIDGET,
				'ui_data' => '',
				'form_id' => '8',
			],
			[
				'slug' => 'password',
				'label' => 'Senha',
				'widget' => FormField::TEXT_WIDGET,
				'ui_data' => '',
				'form_id' => '8',
			],
		];

	public function run()
	{
		foreach (self::FIELDS as $field)
		{
			$form = FormField::build($field['slug'], $field['label'], $field['widget'], $field['form_id']);
			$form->ui_data = $field['ui_data'];
			$form->save();
		}
	}
}
