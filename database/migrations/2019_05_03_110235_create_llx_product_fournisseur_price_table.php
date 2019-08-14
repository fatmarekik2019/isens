<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxProductFournisseurPriceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_product_fournisseur_price', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->integer('entity')->default(1);
			$table->dateTime('datec')->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('fk_product')->nullable();
			$table->integer('fk_soc')->nullable();
			$table->string('ref_fourn', 30)->nullable();
			$table->integer('fk_availability')->nullable();
			$table->float('price', 24, 8)->nullable()->default(0.00000000);
			$table->float('quantity', 10, 0)->nullable();
			$table->float('remise_percent', 10, 0)->default(0);
			$table->float('remise', 10, 0)->default(0);
			$table->float('unitprice', 24, 8)->nullable()->default(0.00000000);
			$table->float('charges', 24, 8)->nullable()->default(0.00000000);
			$table->float('unitcharges', 24, 8)->nullable()->default(0.00000000);
			$table->float('tva_tx', 6, 3);
			$table->integer('info_bits')->default(0);
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
		Schema::drop('llx_product_fournisseur_price');
	}

}
