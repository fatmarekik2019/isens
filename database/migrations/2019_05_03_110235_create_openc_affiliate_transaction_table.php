<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencAffiliateTransactionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_affiliate_transaction', function(Blueprint $table)
		{
			$table->integer('affiliate_transaction_id');
			$table->integer('affiliate_id');
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
		Schema::drop('openc_affiliate_transaction');
	}

}
