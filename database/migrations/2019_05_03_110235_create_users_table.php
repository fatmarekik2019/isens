<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email');
			$table->string('password');
			$table->dateTime('lastlogin');
			$table->string('lastip');
			$table->string('group_id');
			$table->string('Company_Id');
			$table->integer('Reseau_Id');
			$table->string('avatar');
			$table->dateTime('date_registered');
			$table->string('display_name');
			$table->string('temporary_password');
			$table->bigInteger('facebook_id')->unsigned();
			$table->string('type')->default('core');
			$table->string('Country');
			$table->string('City');
			$table->integer('dolibarr_id')->nullable();
			$table->string('language');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
