<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourrierRoutesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courrier_routes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('from_area_id')->references('id')->on('areas');
			$table->integer('to_area_id')->references('id')->on('areas');
			$table->string('courrier_type');
			$table->decimal('fees',10,2);
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
		Schema::drop('courrier_routes');
	}

}
