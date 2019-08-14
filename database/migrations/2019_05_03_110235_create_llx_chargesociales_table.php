<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxChargesocialesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_chargesociales', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->dateTime('date_ech');
			$table->string('libelle', 80);
			$table->integer('entity')->default(1);
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('date_creation')->nullable();
			$table->dateTime('date_valid')->nullable();
			$table->integer('fk_type');
			$table->float('amount', 10, 0)->default(0);
			$table->smallInteger('paye')->default(0);
			$table->date('periode')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_chargesociales');
	}

}
