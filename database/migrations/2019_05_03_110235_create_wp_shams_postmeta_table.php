<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpShamsPostmetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_shams_postmeta', function(Blueprint $table)
		{
			$table->bigInteger('meta_id')->unsigned();
			$table->bigInteger('post_id')->unsigned()->default(0);
			$table->string('meta_key')->nullable();
			$table->text('meta_value')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_shams_postmeta');
	}

}
