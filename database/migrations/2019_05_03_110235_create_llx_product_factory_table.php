<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxProductFactoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_product_factory', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->integer('fk_product_father')->default(0);
			$table->integer('fk_product_children')->default(0);
			$table->float('pmp', 24, 8)->nullable()->default(0.00000000);
			$table->float('price', 24, 8)->nullable()->default(0.00000000);
			$table->float('qty', 10, 0)->nullable();
			$table->integer('globalqty')->default(0);
			$table->text('description', 65535)->nullable();
			$table->integer('ordercomponent')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_product_factory');
	}

}
