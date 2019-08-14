<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIsensUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('isens_users', function(Blueprint $table)
		{
			$table->integer('Id')->primary();
			$table->string('Login', 22);
			$table->string('Password', 22);
			$table->string('Email', 56);
			$table->string('Company_Id', 22);
			$table->smallInteger('Role_Id')->default(2);
			$table->string('Disable', 20)->default('False');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('isens_users');
	}

}
