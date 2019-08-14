<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxElementElementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_element_element', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_source');
			$table->string('sourcetype', 32);
			$table->integer('fk_target')->index('idx_element_element_fk_target');
			$table->string('targettype', 32);
			$table->unique(['fk_source','sourcetype','fk_target','targettype'], 'idx_element_element_idx1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_element_element');
	}

}
