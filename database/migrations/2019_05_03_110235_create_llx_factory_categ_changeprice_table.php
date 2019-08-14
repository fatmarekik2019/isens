<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxFactoryCategChangepriceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_factory_categ_changeprice', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('fk_categories');
			$table->smallInteger('price_level')->nullable()->default(0);
			$table->string('init_price', 14)->nullable();
			$table->string('computemode', 14)->nullable();
			$table->float('computevalue', 24, 8)->nullable()->default(0.00000000);
			$table->string('multiplyby', 14)->nullable();
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
		Schema::drop('llx_factory_categ_changeprice');
	}

}
