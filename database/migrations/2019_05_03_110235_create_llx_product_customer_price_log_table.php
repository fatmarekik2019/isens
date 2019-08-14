<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxProductCustomerPriceLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_product_customer_price_log', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->integer('entity')->default(1);
			$table->dateTime('datec')->nullable();
			$table->integer('fk_product');
			$table->integer('fk_soc');
			$table->float('price', 24, 8)->nullable()->default(0.00000000);
			$table->float('price_ttc', 24, 8)->nullable()->default(0.00000000);
			$table->float('price_min', 24, 8)->nullable()->default(0.00000000);
			$table->float('price_min_ttc', 24, 8)->nullable()->default(0.00000000);
			$table->string('price_base_type', 3)->nullable()->default('HT');
			$table->float('tva_tx', 6, 3)->nullable();
			$table->integer('recuperableonly')->default(0);
			$table->float('localtax1_tx', 6, 3)->nullable()->default(0.000);
			$table->float('localtax2_tx', 6, 3)->nullable()->default(0.000);
			$table->integer('fk_user')->nullable();
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
		Schema::drop('llx_product_customer_price_log');
	}

}
