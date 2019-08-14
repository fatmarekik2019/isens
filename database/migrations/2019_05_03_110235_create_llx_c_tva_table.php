<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCTvaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_tva', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_pays');
			$table->float('taux', 10, 0);
			$table->float('localtax1', 10, 0)->default(0);
			$table->string('localtax1_type', 10)->nullable();
			$table->float('localtax2', 10, 0)->default(0);
			$table->string('localtax2_type', 10)->nullable();
			$table->integer('recuperableonly')->default(0);
			$table->string('note', 128)->nullable();
			$table->boolean('active')->default(1);
			$table->string('accountancy_code_sell', 15)->nullable();
			$table->string('accountancy_code_buy', 15)->nullable();
			$table->unique(['fk_pays','taux','recuperableonly'], 'uk_c_tva_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_c_tva');
	}

}
