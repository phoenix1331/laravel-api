<?php 

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class JobsTableSeeder extends Seeder{

	public function run(){

		$faker = Faker::create();

		foreach (range(1,30) as $index) {

			App\Job::create([

					'name' => $faker->name(),
					'description' => $faker->paragraph(5)

				]);
			
		}

	}

}

