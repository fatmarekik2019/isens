<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_product', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('ref', 128);
			$table->integer('entity')->default(1);
			$table->string('ref_ext', 128)->nullable();
			$table->dateTime('datec')->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->boolean('virtual')->default(0);
			$table->integer('fk_parent')->nullable()->default(0);
			$table->string('label')->index('idx_product_label');
			$table->text('description', 65535)->nullable();
			$table->text('note', 65535)->nullable();
			$table->string('customcode', 32)->nullable();
			$table->integer('fk_country')->nullable();
			$table->float('price', 24, 8)->nullable()->default(0.00000000);
			$table->float('price_ttc', 24, 8)->nullable()->default(0.00000000);
			$table->float('price_min', 24, 8)->nullable()->default(0.00000000);
			$table->float('price_min_ttc', 24, 8)->nullable()->default(0.00000000);
			$table->string('price_base_type', 3)->nullable()->default('HT');
			$table->float('tva_tx', 6, 3)->nullable();
			$table->integer('recuperableonly')->default(0);
			$table->float('localtax1_tx', 6, 3)->nullable()->default(0.000);
			$table->float('localtax2_tx', 6, 3)->nullable()->default(0.000);
			$table->integer('fk_user_author')->nullable();
			$table->boolean('tosell')->nullable()->default(1);
			$table->boolean('tobuy')->nullable()->default(1);
			$table->integer('fk_product_type')->nullable()->default(0);
			$table->string('duration', 6)->nullable();
			$table->integer('seuil_stock_alerte')->nullable()->default(0);
			$table->string('barcode')->nullable()->index('idx_product_barcode');
			$table->integer('fk_barcode_type')->nullable()->default(0);
			$table->string('accountancy_code_sell', 15)->nullable();
			$table->string('accountancy_code_buy', 15)->nullable();
			$table->string('partnumber', 32)->nullable();
			$table->float('weight', 10, 0)->nullable();
			$table->boolean('weight_units')->nullable();
			$table->float('length', 10, 0)->nullable();
			$table->boolean('length_units')->nullable();
			$table->float('surface', 10, 0)->nullable();
			$table->boolean('surface_units')->nullable();
			$table->float('volume', 10, 0)->nullable();
			$table->boolean('volume_units')->nullable();
			$table->integer('stock')->nullable();
			$table->float('pmp', 24, 8)->default(0.00000000);
			$table->string('canvas', 32)->nullable();
			$table->boolean('finished')->nullable();
			$table->boolean('hidden')->nullable()->default(0);
			$table->string('import_key', 14)->nullable()->index('idx_product_import_key');
			$table->integer('desiredstock')->nullable()->default(0);
			$table->string('url')->nullable();
			$table->boolean('tobatch')->default(0);
			$table->unique(['ref','entity'], 'uk_product_ref');
			$table->unique(['barcode','fk_barcode_type','entity'], 'uk_product_barcode');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_product');
	}

}
