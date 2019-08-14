<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_events', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('type', 32);
			$table->integer('entity')->default(1);
			$table->dateTime('dateevent')->nullable()->index('idx_events_dateevent');
			$table->integer('fk_user')->nullable();
			$table->string('description', 250);
			$table->string('ip', 32);
			$table->string('user_agent')->nullable();
			$table->integer('fk_object')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_events');
	}

}
