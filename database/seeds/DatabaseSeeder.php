<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    
    private $tables = [

        'jobs',
        'skills',
        'job_skill'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $this->cleanDatabase();
        Model::unguard();

        $this->call(JobsTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
        $this->call(JobSkillTableSeeder::class);

        Model::reguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }


    private function cleanDatabase(){


        foreach($this->tables as $tableName){

            DB::table($tableName)->truncate();
            
        }


    }
}
