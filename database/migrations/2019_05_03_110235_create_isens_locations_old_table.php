<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIsensLocationsOldTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('isens_locations_old', function(Blueprint $table)
		{
			$table->integer('Id')->primary();
			$table->text('Location', 65535);
			$table->integer('UTC');
			$table->smallInteger('SummerTime')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('isens_locations_old');
	}

}
