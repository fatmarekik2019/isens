<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxProductFournisseurPriceLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_product_fournisseur_price_log', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->dateTime('datec')->nullable();
			$table->integer('fk_product_fournisseur');
			$table->float('price', 24, 8)->nullable()->default(0.00000000);
			$table->float('quantity', 10, 0)->nullable();
			$table->integer('fk_user')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_product_fournisseur_price_log');
	}

}
