<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIsensLocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('isens_locations', function(Blueprint $table)
		{
			$table->integer('Id')->primary();
			$table->string('Location');
			$table->integer('UTC');
			$table->integer('SummerTime');
			$table->string('City');
			$table->integer('Hemis');
			$table->string('Flags', 2);
			$table->string('Plug', 2);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('isens_locations');
	}

}
