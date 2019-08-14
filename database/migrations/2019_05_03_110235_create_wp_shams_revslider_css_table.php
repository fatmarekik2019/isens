<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpShamsRevsliderCssTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_shams_revslider_css', function(Blueprint $table)
		{
			$table->integer('id');
			$table->text('handle', 65535);
			$table->text('settings', 65535)->nullable();
			$table->text('hover', 65535)->nullable();
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
		Schema::drop('wp_shams_revslider_css');
	}

}
