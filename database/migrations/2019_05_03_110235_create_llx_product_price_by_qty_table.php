<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxProductPriceByQtyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_product_price_by_qty', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->integer('fk_product_price');
			$table->timestamp('date_price')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->float('price', 24, 8)->nullable()->default(0.00000000);
			$table->float('quantity', 10, 0)->nullable();
			$table->float('remise_percent', 10, 0)->default(0);
			$table->float('remise', 10, 0)->default(0);
			$table->float('unitprice', 24, 8)->nullable()->default(0.00000000);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_product_price_by_qty');
	}

}
