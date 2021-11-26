<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;
use App\Models\Contribution;
use App\Models\Document;

class ContributionsSeeder extends Seeder
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
		$status = 1;
		$user = 1;
		$documentId = 1;

		do {
			$document = Document::find((($documentId % 20) + 1));
			$contribution = new Contribution;
			$contribution->content = implode(' ', $faker->paragraphs(2));
			$contribution->feedback_admin = implode(' ', $faker->paragraphs(1));
			$contribution->feedback_admin_status = (($status % 5) + 1);
			$contribution->user_id = (($user % 4) + 1);
			$contribution->contribuable_type = get_class($document);
			$contribution->contribuable_id = $document->id;
			$contribution->save();
			$status++;
			$document->contributions()->save($contribution);
			$documentId++;
			$a++;
		} while ($a <= 50);

		//
	}
}
