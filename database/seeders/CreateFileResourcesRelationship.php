<?php

namespace Database\Seeders;


use App\Models\File;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CreateFileResourcesRelationship extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$userFiles = Storage::disk('user_files')->allFiles();
		$users = User::all();
		$fileNemeber = 1;

		foreach($users as $user)
		{
			$file = File::build($user->name, 'Image from ' . $user->name, $userFiles[($fileNemeber % 9) + 1]);
			$file->save();
			$user->files()->save($file);
			$fileNemeber++;
		}

	}

}
