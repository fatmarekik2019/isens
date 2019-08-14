<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCActioncommTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_actioncomm', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('code', 12)->unique('uk_c_actioncomm');
			$table->string('type', 10)->default('system');
			$table->string('libelle', 48);
			$table->string('module', 16)->nullable();
			$table->boolean('active')->default(1);
			$table->boolean('todo')->nullable();
			$table->integer('position')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_c_actioncomm');
	}

}
