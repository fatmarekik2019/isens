<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxStockMouvementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_stock_mouvement', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('datem')->nullable();
			$table->integer('fk_product');
			$table->integer('fk_entrepot');
			$table->float('value', 10, 0)->nullable();
			$table->float('price', 13, 4)->nullable()->default(0.0000);
			$table->smallInteger('type_mouvement')->nullable();
			$table->integer('fk_user_author')->nullable();
			$table->text('label', 65535)->nullable();
			$table->integer('fk_origin')->nullable();
			$table->string('origintype', 32)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_stock_mouvement');
	}

}
