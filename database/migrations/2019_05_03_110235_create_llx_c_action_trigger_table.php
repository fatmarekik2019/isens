<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCActionTriggerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_action_trigger', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('code', 32)->unique('uk_action_trigger_code');
			$table->string('label', 128);
			$table->string('description')->nullable();
			$table->string('elementtype', 16);
			$table->integer('rang')->nullable()->default(0)->index('idx_action_trigger_rang');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_c_action_trigger');
	}

}
