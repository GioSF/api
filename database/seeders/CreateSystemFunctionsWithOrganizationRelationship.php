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
				'slug' => 'journals',
				'description' => 'Sistema de Gerenciamento de Hemeroteca',
				'parent_system_function' => null,
				'organization_id' => 1,
			],
			[
				'name' => 'Hemeroteca',
				'slug' => 'journals',
				'description' => 'Sistema de Gerenciamento de Hemeroteca',
				'parent_system_function' => null,
				'organization_id' => 2,
			],
			[
				'name' => 'Arquivo Historico',
				'slug' => 'collection',
				'description' => 'Sistema de Gerenciamento de Arquivo Historico',
				'parent_system_function' => null,
				'organization_id' => 2,
			],
			[
				'name' => 'Fichas Catalográficas',
				'slug' => 'cards',
				'description' => 'Sistema de Gerenciamento de Fichas Catalográficas',
				'parent_system_function' => null,
				'organization_id' => 2,
			],
			[
				'name' => 'Fichas Catalográficas',
				'slug' => 'cards',
				'description' => 'Sistema de Gerenciamento de Fichas Catalográficas',
				'parent_system_function' => null,
				'organization_id' => 1,
			],
			[
				'name' => 'Transcrições',
				'slug' => 'transcriptions',
				'description' => 'Sistema de Gerenciamento de Transcrições',
				'parent_system_function' => null,
				'organization_id' => 1,
			],
			[
				'name' => 'Transcrições',
				'slug' => 'transcriptions',
				'description' => 'Sistema de Gerenciamento de Transcrições',
				'parent_system_function' => null,
				'organization_id' => 2,
			],
			[
				'name' => 'Notícias',
				'slug' => 'news',
				'description' => 'Sistema de Gerenciamento de Notícias',
				'parent_system_function' => null,
				'organization_id' => 1,
			],
			[
				'name' => 'Notícias',
				'slug' => 'news',
				'description' => 'Sistema de Gerenciamento de Notícias',
				'parent_system_function' => null,
				'organization_id' => 2,
			],
		];

		foreach($systemFunctionData as $systemData)
		{
			$systemFunction = SystemFunction::build($systemData['name'], $systemData['slug'], $systemData['description'], $systemData['parent_system_function']);
			$systemFunction->save();
			$organization = Organization::find($systemData['organization_id']);
			$organization->systemFunctions()->save($systemFunction);
		}
	}
}
