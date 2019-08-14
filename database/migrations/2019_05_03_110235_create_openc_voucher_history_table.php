<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencVoucherHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_voucher_history', function(Blueprint $table)
		{
			$table->integer('voucher_history_id');
			$table->integer('voucher_id');
			$table->integer('order_id');
			$table->decimal('amount', 15, 4);
			$table->dateTime('date_added');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_voucher_history');
	}

}
