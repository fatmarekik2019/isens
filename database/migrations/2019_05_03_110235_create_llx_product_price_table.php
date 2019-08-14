<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxProductPriceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_product_price', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->integer('entity')->default(1);
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('fk_product');
			$table->dateTime('date_price');
			$table->smallInteger('price_level')->nullable()->default(1);
			$table->float('price', 24, 8)->nullable();
			$table->float('price_ttc', 24, 8)->nullable();
			$table->float('price_min', 24, 8)->nullable();
			$table->float('price_min_ttc', 24, 8)->nullable();
			$table->string('price_base_type', 3)->nullable()->default('HT');
			$table->float('tva_tx', 6, 3);
			$table->integer('recuperableonly')->default(0);
			$table->float('localtax1_tx', 6, 3)->nullable()->default(0.000);
			$table->float('localtax2_tx', 6, 3)->nullable()->default(0.000);
			$table->integer('fk_user_author')->nullable();
			$table->boolean('tosell')->nullable()->default(1);
			$table->integer('price_by_qty')->default(0);
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
		Schema::drop('llx_product_price');
	}

}
