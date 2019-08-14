<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpShamsEgNavigationSkinsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_shams_eg_navigation_skins', function(Blueprint $table)
		{
			$table->integer('id');
			$table->string('name');
			$table->string('handle');
			$table->text('css', 16777215);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_shams_eg_navigation_skins');
	}

}
