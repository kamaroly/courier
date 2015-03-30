<?php

// Composer: "fzaninotto/faker": "v1.3.0"
//use Faker\Factory as Faker;

class RoutesTableSeeder extends Seeder {

	public function run()
	{
		//$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			RoutesModel::create([
				'start_route'=>'Kigali',
				'end_route'=>'Butare',
				'price'=>rand(1000,5000),
				'numseats'=>rand(18,32),
				'travelling_company'=>'Volcano',
				'time'=>rand(0,24).':'.rand(0,60),
			]);

			RoutesModel::create([
				'start_route'=>'Kigali',
				'end_route'=>'Kibugo',
				'price'=>rand(1000,5000),
				'numseats'=>rand(18,32),
				'travelling_company'=>'Stella Matutina',
				'time'=>rand(0,24).':'.rand(0,60),
			]);

			RoutesModel::create([
				'start_route'=>'Byuma',
				'end_route'=>'Kigali',
				'price'=>rand(1000,5000),
				'numseats'=>rand(18,32),
				'travelling_company'=>'KBS',
				'time'=>rand(0,24).':'.rand(0,60),
			]);
		}
	}

}