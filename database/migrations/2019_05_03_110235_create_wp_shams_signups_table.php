<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpShamsSignupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_shams_signups', function(Blueprint $table)
		{
			$table->bigInteger('signup_id');
			$table->string('domain', 200)->default('');
			$table->string('path', 100)->default('');
			$table->text('title');
			$table->string('user_login', 60)->default('');
			$table->string('user_email', 100)->default('');
			$table->dateTime('registered')->default('0000-00-00 00:00:00');
			$table->dateTime('activated')->default('0000-00-00 00:00:00');
			$table->boolean('active')->default(0);
			$table->string('activation_key', 50)->default('');
			$table->text('meta')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_shams_signups');
	}

}
