<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxNotifyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_notify', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('daten')->nullable();
			$table->integer('fk_action');
			$table->integer('fk_contact')->nullable();
			$table->integer('fk_user')->nullable();
			$table->string('objet_type', 24);
			$table->integer('objet_id');
			$table->string('email')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_notify');
	}

}
