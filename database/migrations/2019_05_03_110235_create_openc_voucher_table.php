<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencVoucherTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_voucher', function(Blueprint $table)
		{
			$table->integer('voucher_id');
			$table->integer('order_id');
			$table->string('code', 10);
			$table->string('from_name', 64);
			$table->string('from_email', 96);
			$table->string('to_name', 64);
			$table->string('to_email', 96);
			$table->text('message', 65535);
			$table->decimal('amount', 15, 4);
			$table->integer('voucher_theme_id');
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
		Schema::drop('openc_voucher');
	}

}
