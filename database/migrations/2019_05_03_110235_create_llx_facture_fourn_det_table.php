<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxFactureFournDetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_facture_fourn_det', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_facture_fourn')->index('idx_facture_fourn_det_fk_facture');
			$table->integer('fk_product')->nullable();
			$table->string('ref', 50)->nullable();
			$table->string('label')->nullable();
			$table->text('description', 65535)->nullable();
			$table->float('pu_ht', 24, 8)->nullable();
			$table->float('pu_ttc', 24, 8)->nullable();
			$table->float('qty', 10, 0)->nullable();
			$table->float('remise_percent', 10, 0)->nullable()->default(0);
			$table->float('tva_tx', 6, 3)->nullable();
			$table->float('localtax1_tx', 6, 3)->nullable()->default(0.000);
			$table->string('localtax1_type', 10)->nullable();
			$table->float('localtax2_tx', 6, 3)->nullable()->default(0.000);
			$table->string('localtax2_type', 10)->nullable();
			$table->float('total_ht', 24, 8)->nullable();
			$table->float('tva', 24, 8)->nullable();
			$table->float('total_localtax1', 24, 8)->nullable()->default(0.00000000);
			$table->float('total_localtax2', 24, 8)->nullable()->default(0.00000000);
			$table->float('total_ttc', 24, 8)->nullable();
			$table->integer('product_type')->nullable()->default(0);
			$table->dateTime('date_start')->nullable();
			$table->dateTime('date_end')->nullable();
			$table->integer('info_bits')->default(0);
			$table->string('import_key', 14)->nullable();
			$table->integer('fk_code_ventilation')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_facture_fourn_det');
	}

}
