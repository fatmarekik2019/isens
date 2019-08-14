<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIsensProgramTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('isens_program', function(Blueprint $table)
		{
			$table->integer('Id')->primary();
			$table->integer('Diffuser_Id');
			$table->string('Data', 20);
			$table->string('Program', 490);
			$table->integer('Version');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('isens_program');
	}

}
