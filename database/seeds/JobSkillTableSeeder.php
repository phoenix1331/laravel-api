<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class JobSkillTableSeeder extends Seeder{

	public function run(){

		$faker = Faker::create();

		$skillId = App\Skill::lists('id')->toArray();
		$jobId = App\Job::lists('id')->toArray();

		foreach (range(1,30) as $index) {

			\DB::table('job_skill')->insert([

				'job_id' => $faker->randomElement($skillId),
				'skill_id' => $faker->randomElement($jobId)

				]);
			
		}

	}

}