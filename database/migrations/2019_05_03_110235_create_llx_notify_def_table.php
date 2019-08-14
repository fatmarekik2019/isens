<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxNotifyDefTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_notify_def', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->date('datec')->nullable();
			$table->integer('fk_action');
			$table->integer('fk_soc');
			$table->integer('fk_contact')->nullable();
			$table->integer('fk_user')->nullable();
			$table->string('type', 16)->nullable()->default('email');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_notify_def');
	}

}
