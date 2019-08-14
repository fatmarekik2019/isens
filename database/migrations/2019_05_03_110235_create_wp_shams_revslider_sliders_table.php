<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpShamsRevsliderSlidersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_shams_revslider_sliders', function(Blueprint $table)
		{
			$table->integer('id');
			$table->text('title');
			$table->text('alias')->nullable();
			$table->text('params', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_shams_revslider_sliders');
	}

}
