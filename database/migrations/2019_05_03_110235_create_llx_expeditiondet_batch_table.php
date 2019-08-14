<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxExpeditiondetBatchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_expeditiondet_batch', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_expeditiondet')->index('idx_fk_expeditiondet');
			$table->date('eatby')->nullable();
			$table->date('sellby')->nullable();
			$table->string('batch', 30)->nullable();
			$table->float('qty', 10, 0)->default(0);
			$table->integer('fk_origin_stock');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_expeditiondet_batch');
	}

}
