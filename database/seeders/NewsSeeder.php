<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;
use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = FakerFactory::create('pt_BR');
		$counter = 1;

		do {
			$news = new News;
			$news->title = $faker->text(20);
			$news->subtitle = $faker->text(50);
			$news->content = implode(' ', $faker->paragraphs(2));
			$news->status = ($counter % 2) + 1;
			$news->organization_id = ($counter % 2) + 1;
			$news->save();
			$counter++;
		} while ($counter <= 30);

    }
}
