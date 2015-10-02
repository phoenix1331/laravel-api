<?php 

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SkillsTableSeeder extends Seeder{

	public function run(){

		$faker = Faker::create();

		foreach (range(1,10) as $index) {

			App\Skill::create([

				'name' => $faker->word

				]);
			
		}

	}

}