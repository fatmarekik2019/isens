<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxHolidayLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_holiday_logs', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->dateTime('date_action');
			$table->integer('fk_user_action');
			$table->integer('fk_user_update');
			$table->string('type_action');
			$table->string('prev_solde');
			$table->string('new_solde');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_holiday_logs');
	}

}
