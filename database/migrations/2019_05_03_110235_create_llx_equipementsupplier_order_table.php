<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxEquipementsupplierOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_equipementsupplier_order', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_product')->nullable()->default(0);
			$table->integer('fk_commande')->nullable();
			$table->integer('fk_commandedet')->nullable();
			$table->integer('position')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_equipementsupplier_order');
	}

}
