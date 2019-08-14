<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCRevenuestampTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_revenuestamp', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_pays');
			$table->float('taux', 10, 0);
			$table->string('note', 128)->nullable();
			$table->boolean('active')->default(1);
			$table->string('accountancy_code_sell', 15)->nullable();
			$table->string('accountancy_code_buy', 15)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_c_revenuestamp');
	}

}
