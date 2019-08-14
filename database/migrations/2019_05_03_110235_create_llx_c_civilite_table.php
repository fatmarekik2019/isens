<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCCiviliteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_civilite', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('code', 6)->unique('uk_c_civilite');
			$table->string('civilite', 50)->nullable();
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
		Schema::drop('llx_c_civilite');
	}

}
