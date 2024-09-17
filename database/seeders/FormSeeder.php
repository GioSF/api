<?php

namespace Database\Seeders;

use App\Models\Form;
use App\Models\Organization;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$forms = [
			[
				'slug' => 'card',
			],
			[
				'slug' => 'contribution',
			],
			[
				'slug' => 'news',
			],
			[
				'slug' => 'user',
			],
		];
		foreach ($forms as $formData)
		{
			$organization = Organization::find(1);
			$form = Form::build($formData['slug'], $organization);
			$form->save();
		}
		foreach ($forms as $formData)
		{
			$organization = Organization::find(2);
			$form = Form::build($formData['slug'], $organization);
			$form->save();
		}
	}
}
