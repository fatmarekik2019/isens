<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIsensHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('isens_history', function(Blueprint $table)
		{
			$table->integer('Id')->primary();
			$table->dateTime('Date');
			$table->text('Event', 65535);
			$table->integer('User_Id');
			$table->integer('Diffuser_Id')->nullable();
			$table->integer('Group_Liv')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('isens_history');
	}

}
