<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpShamsWoocommerceOrderItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_shams_woocommerce_order_items', function(Blueprint $table)
		{
			$table->bigInteger('order_item_id');
			$table->text('order_item_name');
			$table->string('order_item_type', 200)->default('');
			$table->bigInteger('order_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_shams_woocommerce_order_items');
	}

}
