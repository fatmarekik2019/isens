<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCInputReasonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_input_reason', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('code', 30)->nullable()->unique('uk_c_input_reason');
			$table->string('label', 60)->nullable();
			$table->boolean('active')->default(1);
			$table->string('module', 32)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_c_input_reason');
	}

}
