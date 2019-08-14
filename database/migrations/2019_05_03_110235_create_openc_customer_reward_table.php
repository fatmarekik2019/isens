<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencCustomerRewardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_customer_reward', function(Blueprint $table)
		{
			$table->integer('customer_reward_id');
			$table->integer('customer_id')->default(0);
			$table->integer('order_id')->default(0);
			$table->text('description', 65535);
			$table->integer('points')->default(0);
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
		Schema::drop('openc_customer_reward');
	}

}
