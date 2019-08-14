<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpShamsRegistrationLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_shams_registration_log', function(Blueprint $table)
		{
			$table->bigInteger('ID');
			$table->string('email')->default('');
			$table->string('IP', 30)->default('');
			$table->bigInteger('blog_id')->default(0);
			$table->dateTime('date_registered')->default('0000-00-00 00:00:00');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_shams_registration_log');
	}

}
