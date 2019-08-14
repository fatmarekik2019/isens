<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpShamsSgActionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_shams_sg_action', function(Blueprint $table)
		{
			$table->integer('id')->unsigned();
			$table->string('name');
			$table->boolean('type');
			$table->boolean('subtype')->default(0);
			$table->boolean('status');
			$table->boolean('progress')->default(0);
			$table->dateTime('start_date');
			$table->dateTime('update_date')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_shams_sg_action');
	}

}
