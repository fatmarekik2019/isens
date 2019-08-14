<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxActioncommResourcesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_actioncomm_resources', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_actioncomm');
			$table->string('element_type', 50);
			$table->integer('fk_element')->index('idx_actioncomm_resources_fk_element');
			$table->string('answer_status', 50)->nullable();
			$table->smallInteger('mandatory')->nullable();
			$table->smallInteger('transparent')->nullable();
			$table->unique(['fk_actioncomm','element_type','fk_element'], 'idx_actioncomm_resources_idx1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_actioncomm_resources');
	}

}
