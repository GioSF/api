<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;
use App\Models\Document;
use App\Models\Organization;
use Illuminate\Database\Seeder;

class DocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = FakerFactory::create('pt_BR');
		$a = 0;
		$organization = Organization::find(2);
		$counter = 1;

		do {
			$document = new Document;
			$document->file_path = $faker->filePath();
			$document->content = ($counter % 4) == 0 ? implode(' ', $faker->paragraphs(1)) : '';
			$document->organization_id = $organization->id;
			$document->save();
			$counter++;
			$a++;
		} while ($a < 30);

    }
}
