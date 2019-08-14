<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIsensProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('isens_products', function(Blueprint $table)
		{
			$table->integer('Id')->primary();
			$table->string('Label');
			$table->integer('fk_product');
			$table->string('Type', 15);
			$table->string('Color', 15);
			$table->string('Plug', 2);
			$table->integer('plug_fk_product')->nullable();
			$table->integer('elec_fk_product')->nullable();
			$table->integer('alim_fk_product')->nullable();
			$table->integer('tete_fk_product')->nullable();
			$table->integer('boitier_fk_product')->nullable();
			$table->integer('boite_pomp_fk_product')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('isens_products');
	}

}
