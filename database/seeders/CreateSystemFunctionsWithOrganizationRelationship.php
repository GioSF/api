<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\SystemFunction;
use Illuminate\Database\Seeder;

class CreateSystemFunctionsWithOrganizationRelationship extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$systemFunctionData = 
		[
			[
				'name' => 'Hemeroteca',
				'description' => 'Sistema de Gerenciamento de Hemeroteca',
				'parent_system_function' => null,
				'organization_id' => 1,
			],
			[
				'name' => 'Hemeroteca',
				'description' => 'Sistema de Gerenciamento de Hemeroteca',
				'parent_system_function' => null,
				'organization_id' => 2,
			],
			[
				'name' => 'Arquivo Historico',
				'description' => 'Sistema de Gerenciamento Arquivo Historico',
				'parent_system_function' => null,
				'organization_id' => 2,
			],
		];

		foreach($systemFunctionData as $systemData)
		{
			$systemFunction = SystemFunction::build($systemData['name'], $systemData['description'], $systemData['parent_system_function']);
			$systemFunction->save();
			$organization = Organization::find($systemData['organization_id']);
			$organization->systemFunctions()->save($systemFunction);
		}

		//
	}
}
