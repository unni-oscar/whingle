<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        DB::table('profiles')->insert([
                'id' => str_random(10),
	        	'user_id' => $index,
	        	'created_by' => $faker->numberBetween(1,6),
	        	'gender' => $faker->numberBetween(1,2),
	        	'marital_status' => $faker->numberBetween(0,3),
	        	'has_children' => $faker->numberBetween(0,1),
	        	'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
	            'name' => $faker->name,
	   			'about' =>$faker->paragraph,
	   			'religion' => $faker->numberBetween(1,6),
	   			'caste' => $faker->numberBetween(1,60),
	   			'star' => $faker->numberBetween(1,20),
	   			'moon_sign' => $faker->numberBetween(1,20),
	   			'manglik' => $faker->numberBetween(1,4),
	   			'horoscope' => $faker->numberBetween(1,4),
	   			'education' => $faker->numberBetween(1,8),
	   			'education_in' => $faker->numberBetween(1,25),
	   			'job' => $faker->numberBetween(1,8),
	   			'job_as' => $faker->numberBetween(1,25),
	   			'income' => $faker->numberBetween(1,2000),
	   			'height' => $faker->numberBetween(10,24),
	   			'weight' => $faker->numberBetween(30,99),
	   			'build' => $faker->numberBetween(1,5),
	   			'complexion' => $faker->numberBetween(1,5),
	   			'blood_group' => $faker->numberBetween(1,6),
	   			'disability' => $faker->numberBetween(0,1),
	   			'smoke' => $faker->numberBetween(1,3),
	   			'drink' => $faker->numberBetween(1,3),
	   			'diet' => $faker->numberBetween(1,3),
	   			'father' => $faker->numberBetween(1,5),
	   			'mother' => $faker->numberBetween(1,5),
	   			'brothers' => $faker->numberBetween(1,10),
	   			'brothers_married' => $faker->numberBetween(1,10),
	   			'sisters' => $faker->numberBetween(1,10),
	   			'sisters_married' => $faker->numberBetween(1,10),
	   			'family_type' => $faker->numberBetween(1,5),
	   			'family_values' => $faker->numberBetween(1,5),
	   			'family_status' => $faker->numberBetween(1,5),
	   			'country_living' => $faker->numberBetween(1,200),
	   			'state_living' => $faker->numberBetween(1,2000),
	   			'city_living' => $faker->numberBetween(1,20000),
	   			'address' => $faker->address,
	   			//'contact_number' => $faker->tollFreePhoneNumber
	   			



	        ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
