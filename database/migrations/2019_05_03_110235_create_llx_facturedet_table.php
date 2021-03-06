<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxFacturedetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_facturedet', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_facture')->index('idx_facturedet_fk_facture');
			$table->integer('fk_parent_line')->nullable();
			$table->integer('fk_product')->nullable()->index('idx_facturedet_fk_product');
			$table->string('label')->nullable();
			$table->text('description', 65535)->nullable();
			$table->float('tva_tx', 6, 3)->nullable();
			$table->float('localtax1_tx', 6, 3)->nullable()->default(0.000);
			$table->string('localtax1_type', 10)->nullable();
			$table->float('localtax2_tx', 6, 3)->nullable()->default(0.000);
			$table->string('localtax2_type', 10)->nullable();
			$table->float('qty', 10, 0)->nullable();
			$table->float('remise_percent', 10, 0)->nullable()->default(0);
			$table->float('remise', 10, 0)->nullable()->default(0);
			$table->integer('fk_remise_except')->nullable();
			$table->float('subprice', 24, 8)->nullable();
			$table->float('price', 24, 8)->nullable();
			$table->float('total_ht', 24, 8)->nullable();
			$table->float('total_tva', 24, 8)->nullable();
			$table->float('total_localtax1', 24, 8)->nullable()->default(0.00000000);
			$table->float('total_localtax2', 24, 8)->nullable()->default(0.00000000);
			$table->float('total_ttc', 24, 8)->nullable();
			$table->integer('product_type')->nullable()->default(0);
			$table->dateTime('date_start')->nullable();
			$table->dateTime('date_end')->nullable();
			$table->integer('info_bits')->nullable()->default(0);
			$table->float('buy_price_ht', 24, 8)->nullable()->default(0.00000000);
			$table->integer('fk_product_fournisseur_price')->nullable();
			$table->integer('fk_code_ventilation')->default(0);
			$table->integer('special_code')->unsigned()->nullable()->default(0);
			$table->integer('rang')->nullable()->default(0);
			$table->string('import_key', 14)->nullable();
			$table->unique(['fk_remise_except','fk_facture'], 'uk_fk_remise_except');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_facturedet');
	}

}
