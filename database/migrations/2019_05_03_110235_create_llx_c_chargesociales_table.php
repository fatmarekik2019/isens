<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCChargesocialesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_chargesociales', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('libelle', 80)->nullable();
			$table->smallInteger('deductible')->default(0);
			$table->boolean('active')->default(1);
			$table->string('code', 12);
			$table->string('accountancy_code', 15)->nullable();
			$table->integer('fk_pays')->default(1);
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
		Schema::drop('llx_c_chargesociales');
	}

}
