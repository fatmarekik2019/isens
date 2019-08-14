<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencOrderHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_order_history', function(Blueprint $table)
		{
			$table->integer('order_history_id');
			$table->integer('order_id');
			$table->integer('order_status_id');
			$table->boolean('notify')->default(0);
			$table->text('comment', 65535);
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
		Schema::drop('openc_order_history');
	}

}
