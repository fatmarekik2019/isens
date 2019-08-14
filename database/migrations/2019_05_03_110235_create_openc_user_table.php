<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_user', function(Blueprint $table)
		{
			$table->integer('user_id');
			$table->integer('user_group_id');
			$table->string('username', 20)->default('');
			$table->string('password', 32)->default('');
			$table->string('firstname', 32)->default('');
			$table->string('lastname', 32)->default('');
			$table->string('email', 96)->default('');
			$table->string('code', 32);
			$table->string('ip', 15)->default('');
			$table->boolean('status');
			$table->dateTime('date_added')->default('0000-00-00 00:00:00');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_user');
	}

}
