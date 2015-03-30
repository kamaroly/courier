<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReservesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reserves', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('date');
            $table->string('names');
            $table->string('time');
            $table->string('email');
            $table->string('telephone');
            $table->string('start_route');
            $table->decimal('price');
            $table->decimal('totalprice');
            $table->string('end_route');
            $table->string('travelling_company');
            $table->string('count_seat');
            $table->string('transactionnum');
            $table->boolean('approved');
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
		Schema::drop('reserves');
	}

}
