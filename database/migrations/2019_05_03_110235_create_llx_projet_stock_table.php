<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxProjetStockTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_projet_stock', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->integer('fk_project')->default(0);
			$table->integer('fk_product')->default(0);
			$table->float('qty_get', 10, 0)->nullable();
			$table->dateTime('date_creation')->nullable();
			$table->integer('fk_user_author')->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->float('pmp', 24, 8)->nullable()->default(0.00000000);
			$table->float('price', 24, 8)->nullable()->default(0.00000000);
			$table->text('note_public', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_projet_stock');
	}

}
