<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCProspectlevelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_prospectlevel', function(Blueprint $table)
		{
			$table->string('code', 12)->primary();
			$table->string('label', 30)->nullable();
			$table->smallInteger('sortorder')->nullable();
			$table->smallInteger('active')->default(1);
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
		Schema::drop('llx_c_prospectlevel');
	}

}
