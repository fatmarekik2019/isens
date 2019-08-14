<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxUserAlertTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_user_alert', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->integer('type')->nullable();
			$table->integer('fk_contact')->nullable();
			$table->integer('fk_user')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_user_alert');
	}

}
