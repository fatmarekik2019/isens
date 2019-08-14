<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIsensPumpsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('isens_pumps', function(Blueprint $table)
		{
			$table->integer('Id')->primary();
			$table->string('Num_serie');
			$table->string('Type', 15);
			$table->date('Date');
			$table->string('Fourn', 15);
			$table->float('Amp', 10, 0);
			$table->float('Pression', 10, 0);
			$table->float('Debit', 10, 0);
			$table->boolean('Etat');
			$table->integer('Diffuser_Id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('isens_pumps');
	}

}
