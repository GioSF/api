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
		$counter = 0;

		do {
			$document = Document::find((($counter % 20) + 1));
			$contribution = new Contribution;
			$contribution->content = implode(' ', $faker->paragraphs(1));
			$contribution->feedback_admin = implode(' ', $faker->paragraphs(1));
			$contribution->feedback_admin_status = rand(1, 5);
			$contribution->user_id = (($counter % 10) + 1);
			$contribution->contribuable_type = get_class($document);
			$contribution->contribuable_id = $document->id;
			$contribution->save();
			$document->contributions()->save($contribution);
			$counter++;
		} while ($counter <= 50);

		//
	}
}
