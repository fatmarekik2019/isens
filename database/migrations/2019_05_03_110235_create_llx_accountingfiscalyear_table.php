<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxAccountingfiscalyearTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_accountingfiscalyear', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('label', 128);
			$table->date('datestart')->nullable();
			$table->date('dateend')->nullable();
			$table->boolean('statut')->default(0);
			$table->integer('entity')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_accountingfiscalyear');
	}

}
