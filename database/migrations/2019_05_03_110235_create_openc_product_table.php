<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_product', function(Blueprint $table)
		{
			$table->integer('product_id');
			$table->string('model', 64);
			$table->string('sku', 64);
			$table->string('upc', 12);
			$table->string('location', 128);
			$table->integer('quantity')->default(0);
			$table->integer('stock_status_id');
			$table->string('image')->nullable();
			$table->integer('manufacturer_id');
			$table->boolean('shipping')->default(1);
			$table->decimal('price', 15, 4)->default(0.0000);
			$table->integer('points')->default(0);
			$table->integer('tax_class_id');
			$table->date('date_available');
			$table->decimal('weight', 5)->default(0.00);
			$table->integer('weight_class_id')->default(0);
			$table->decimal('length', 5)->default(0.00);
			$table->decimal('width', 5)->default(0.00);
			$table->decimal('height', 5)->default(0.00);
			$table->integer('length_class_id')->default(0);
			$table->boolean('subtract')->default(1);
			$table->integer('minimum')->default(1);
			$table->integer('sort_order')->default(0);
			$table->boolean('status')->default(0);
			$table->dateTime('date_added')->default('0000-00-00 00:00:00');
			$table->dateTime('date_modified')->default('0000-00-00 00:00:00');
			$table->integer('viewed')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_product');
	}

}
