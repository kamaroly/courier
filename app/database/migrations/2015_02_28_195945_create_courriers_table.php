<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourriersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courriers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('details');
			$table->integer('from_area');
			$table->integer('to_area');
			$table->string('type');
			$table->timestamp('pickup_date');
			$table->string('pickup_time',5);
			$table->integer('sender_id');
			$table->integer('receiver_id');
			$table->integer('transporter_id')->default(0);
			$table->decimal('price',10,2)->default(0);

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
		Schema::drop('courriers');
	}

}
