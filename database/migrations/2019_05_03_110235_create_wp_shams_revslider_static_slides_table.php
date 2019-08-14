<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpShamsRevsliderStaticSlidesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_shams_revslider_static_slides', function(Blueprint $table)
		{
			$table->integer('id');
			$table->integer('slider_id');
			$table->text('params', 65535);
			$table->text('layers', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_shams_revslider_static_slides');
	}

}
