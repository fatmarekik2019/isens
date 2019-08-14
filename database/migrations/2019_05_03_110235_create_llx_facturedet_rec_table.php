<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxFacturedetRecTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_facturedet_rec', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_facture');
			$table->integer('fk_parent_line')->nullable();
			$table->integer('fk_product')->nullable();
			$table->integer('product_type')->nullable()->default(0);
			$table->string('label')->nullable();
			$table->text('description', 65535)->nullable();
			$table->float('tva_tx', 6, 3)->nullable()->default(19.600);
			$table->float('localtax1_tx', 6, 3)->nullable()->default(0.000);
			$table->string('localtax1_type', 10)->nullable();
			$table->float('localtax2_tx', 6, 3)->nullable()->default(0.000);
			$table->string('localtax2_type', 10)->nullable();
			$table->float('qty', 10, 0)->nullable();
			$table->float('remise_percent', 10, 0)->nullable()->default(0);
			$table->float('remise', 10, 0)->nullable()->default(0);
			$table->float('subprice', 24, 8)->nullable();
			$table->float('price', 24, 8)->nullable();
			$table->float('total_ht', 24, 8)->nullable();
			$table->float('total_tva', 24, 8)->nullable();
			$table->float('total_localtax1', 24, 8)->nullable()->default(0.00000000);
			$table->float('total_localtax2', 24, 8)->nullable()->default(0.00000000);
			$table->float('total_ttc', 24, 8)->nullable();
			$table->integer('info_bits')->nullable()->default(0);
			$table->integer('special_code')->unsigned()->nullable()->default(0);
			$table->integer('rang')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_facturedet_rec');
	}

}
