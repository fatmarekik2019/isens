<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxAccountingSystemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_accounting_system', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('pcg_version', 12)->unique('uk_accounting_system_pcg_version');
			$table->integer('fk_pays');
			$table->string('label', 128);
			$table->smallInteger('active')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_accounting_system');
	}

}
