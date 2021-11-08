<?php

namespace Database\Seeders;

use \App\Models\Role;
use \App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserRoleRelationshipSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$users = User::all();
		$userRole = [1,1,2,2,2,3,3,3,3,3];

		foreach($users as $user)
		{
			$role = Role::find(current($userRole));
			$user->roles()->save($role);
			next($userRole);
		}
	}
}
