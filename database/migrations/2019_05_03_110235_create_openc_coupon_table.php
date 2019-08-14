<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencCouponTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_coupon', function(Blueprint $table)
		{
			$table->integer('coupon_id');
			$table->string('name', 128);
			$table->string('code', 10);
			$table->char('type', 1);
			$table->decimal('discount', 15, 4);
			$table->boolean('logged');
			$table->boolean('shipping');
			$table->decimal('total', 15, 4);
			$table->date('date_start')->default('0000-00-00');
			$table->date('date_end')->default('0000-00-00');
			$table->integer('uses_total');
			$table->string('uses_customer', 11);
			$table->boolean('status');
			$table->dateTime('date_added')->default('0000-00-00 00:00:00');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_coupon');
	}

}
