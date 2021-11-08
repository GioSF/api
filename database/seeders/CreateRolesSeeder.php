<?php

namespace Database\Seeders;

use \App\Models\Role;
use Illuminate\Database\Seeder;

class CreateRolesSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$rolesData = [
			[
				'slug' => 'admin',
				'title' => 'Administrador',
				'description' => 'Acesso completo às functionalidades do sistema: criar, listar, editar, apagar',
			],
			[
				'slug' => 'editor',
				'title' => 'Editor',
				'description' => 'Acesso limitado às functionalidades do sistema: criar, listar, editar',
			],
			[
				'slug' => 'contribuidor',
				'title' => 'Contribuidor',
				'description' => 'Acesso limitado às functionalidades do sistema: criar contributions',
			],
		];

		foreach ($rolesData as $roleData)
		{
			$role = Role::build($roleData['slug'], $roleData['title'], $roleData['description']);
			$role->save();
		}

	}
}
