<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIsensLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('isens_logs', function(Blueprint $table)
		{
			$table->integer('Id')->primary();
			$table->string('Name', 225);
			$table->dateTime('Date');
			$table->enum('Type', array('User','Diffuser','Program'));
			$table->integer('Intensity');
			$table->string('ConsCurrent', 20);
			$table->integer('PerfumeLevel');
			$table->text('Event', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('isens_logs');
	}

}
