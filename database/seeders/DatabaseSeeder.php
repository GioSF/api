<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		\App\Models\User::factory(10)->create();
		$this->call(\Database\Seeders\OrganizationSeeder::class);
		$this->call(\Database\Seeders\JournalsSeeder::class);
		$this->call(\Database\Seeders\UserOrganizationSeeder::class);
		$this->call(\Database\Seeders\CreateFileResourcesRelationship::class);
		$this->call(\Database\Seeders\CreateSystemFunctionsWithOrganizationRelationship::class);
		$this->call(\Database\Seeders\CreateRolesSeeder::class);
		$this->call(\Database\Seeders\CreateUserRoleRelationshipSeeder::class);
		// $this->call(\Database\Seeders\IssuesSeeder::class);
		$this->call(\Database\Seeders\CardSeeder::class);
	}
}
