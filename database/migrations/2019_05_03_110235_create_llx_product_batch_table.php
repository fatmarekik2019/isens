<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxProductBatchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_product_batch', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('fk_product_stock');
			$table->dateTime('eatby')->nullable();
			$table->dateTime('sellby')->nullable();
			$table->string('batch', 30)->nullable();
			$table->float('qty', 10, 0)->default(0);
			$table->string('import_key', 14)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_product_batch');
	}

}
