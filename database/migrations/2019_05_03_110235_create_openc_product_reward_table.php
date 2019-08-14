<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencProductRewardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_product_reward', function(Blueprint $table)
		{
			$table->integer('product_reward_id');
			$table->integer('product_id')->default(0);
			$table->integer('customer_group_id')->default(0);
			$table->integer('points')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_product_reward');
	}

}
