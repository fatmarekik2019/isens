<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencProductSpecialTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_product_special', function(Blueprint $table)
		{
			$table->integer('product_special_id');
			$table->integer('product_id');
			$table->integer('customer_group_id');
			$table->integer('priority')->default(1);
			$table->decimal('price', 15, 4)->default(0.0000);
			$table->date('date_start')->default('0000-00-00');
			$table->date('date_end')->default('0000-00-00');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_product_special');
	}

}
