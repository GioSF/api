<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Organization;
use App\Models\User;

class UserOrganizationSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$users = User::all();
		$orgId = 1;

		foreach($users as $user)
		{
			$organization = Organization::find(($orgId % 2) + 1);
			$organization->users()->save($user);
			$orgId++;
		}
	}
}
