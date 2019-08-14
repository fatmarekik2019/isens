<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxElementLockTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_element_lock', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_element');
			$table->string('elementtype', 32);
			$table->dateTime('datel')->nullable();
			$table->dateTime('datem')->nullable();
			$table->string('sessionid')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_element_lock');
	}

}
