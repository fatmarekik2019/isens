<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencOrderOptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_order_option', function(Blueprint $table)
		{
			$table->integer('order_option_id');
			$table->integer('order_id');
			$table->integer('order_product_id');
			$table->integer('product_option_id');
			$table->integer('product_option_value_id')->default(0);
			$table->string('name');
			$table->text('value', 65535);
			$table->string('type', 32);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_order_option');
	}

}
