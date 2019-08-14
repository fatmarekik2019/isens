<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencCustomerTransactionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_customer_transaction', function(Blueprint $table)
		{
			$table->integer('customer_transaction_id');
			$table->integer('customer_id');
			$table->integer('order_id');
			$table->text('description', 65535);
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
		Schema::drop('openc_customer_transaction');
	}

}
