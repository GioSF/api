<?php

namespace Database\Seeders;


use App\Models\File;
use App\Models\User;
use App\Models\Organization;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\Hash;
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
		$organizations = Organization::all();

		foreach ($organizations as $organization)
		{
			foreach($users as $user)
			{
				$slug = strtolower($user->name);
				$slug = preg_replace('/[^A-Za-z0-9 \-]/', '', $slug);
				$slug = str_replace(' ', '_', $slug);
				$faker = FakerFactory::create('pt_BR');
				$filePath = $faker->filePath();
				$file = File::build($slug, $user->name, 'Image from ' . $user->name, $filePath, Hash::make($filePath), $organization);
				$file->save();
				$user->files()->save($file);
			}
		}
	}
}

