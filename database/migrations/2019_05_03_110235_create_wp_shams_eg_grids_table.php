<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpShamsEgGridsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_shams_eg_grids', function(Blueprint $table)
		{
			$table->integer('id');
			$table->string('name');
			$table->string('handle');
			$table->text('postparams', 65535);
			$table->text('params', 65535);
			$table->text('layers', 16777215);
			$table->text('settings', 65535)->nullable();
			$table->dateTime('last_modified')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_shams_eg_grids');
	}

}
