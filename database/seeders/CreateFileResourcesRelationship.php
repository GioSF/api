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
		/*

		### Importante ###

		Os arquivos para este seeder devem ser 10 imagens numearadas de 1 a 10
		Devem ser adicionados à pasta app/user_files
		Um pasta com arquivos de imagens para este seeder está disponível em:
		https://drive.google.com/drive/folders/1h-2eAX1XaeV2NTDfQM5lPSQW5qcTAsxw?usp=sharing

		*/

		$userFiles = Storage::disk('user_files')->allFiles();
		$users = User::all();
		$fileNumber = 1;

		foreach($users as $user)
		{
			$file = File::build($user->name, 'Image from ' . $user->name, $userFiles[($fileNumber % 9) + 1]);
			$file->save();
			$user->files()->save($file);
			$fileNumber++;
		}

	}

}
