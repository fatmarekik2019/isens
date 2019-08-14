<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencCustomerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_customer', function(Blueprint $table)
		{
			$table->integer('customer_id');
			$table->integer('store_id')->default(0);
			$table->string('company', 22);
			$table->string('firstname', 32)->default('');
			$table->string('lastname', 32)->default('');
			$table->string('email', 96)->default('');
			$table->string('telephone', 32)->default('');
			$table->string('fax', 32)->default('');
			$table->string('password', 40)->default('');
			$table->text('cart', 65535)->nullable();
			$table->text('wishlist', 65535)->nullable();
			$table->boolean('newsletter')->default(0);
			$table->integer('address_id')->default(0);
			$table->integer('customer_group_id');
			$table->string('ip', 15)->default('0');
			$table->boolean('status');
			$table->string('TVA', 13);
			$table->string('SIRET', 14);
			$table->string('data', 20);
			$table->string('program', 490);
			$table->boolean('approved');
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
		Schema::drop('openc_customer');
	}

}
