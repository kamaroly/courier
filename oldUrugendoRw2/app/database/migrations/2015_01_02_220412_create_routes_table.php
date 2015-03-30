<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoutesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('RoutesModel', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('start_route');
			$table->string('end_route');
			$table->string('price');
			$table->string('numseats');
			$table->string('travelling_company');
			$table->string('time');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('RoutesModel');
	}

}
