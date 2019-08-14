<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxEventElementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_event_element', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_source');
			$table->integer('fk_target');
			$table->string('targettype', 32);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_event_element');
	}

}
