<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransportersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Transporters', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->string('type');
			$table->string('name');
			$table->string('NID',16);
			$table->string('driving_license');
			$table->string('jacket_number');
			$table->string('phone',12);
			$table->string('alternative_phone',12);
			$table->string('location');

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
		Schema::drop('Transporters');
	}

}
