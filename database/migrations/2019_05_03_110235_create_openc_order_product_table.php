<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencOrderProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_order_product', function(Blueprint $table)
		{
			$table->integer('order_product_id');
			$table->integer('order_id');
			$table->integer('product_id');
			$table->string('name');
			$table->string('model', 24);
			$table->integer('quantity');
			$table->decimal('price', 15, 4)->default(0.0000);
			$table->decimal('total', 15, 4)->default(0.0000);
			$table->decimal('tax', 15, 4)->default(0.0000);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_order_product');
	}

}
