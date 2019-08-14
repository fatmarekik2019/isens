<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_order', function(Blueprint $table)
		{
			$table->integer('order_id');
			$table->integer('invoice_no')->default(0);
			$table->string('invoice_prefix', 10);
			$table->integer('store_id')->default(0);
			$table->string('store_name', 64);
			$table->string('store_url');
			$table->integer('customer_id')->default(0);
			$table->integer('customer_group_id')->default(0);
			$table->string('firstname', 32)->default('');
			$table->string('lastname', 32);
			$table->string('email', 96);
			$table->string('telephone', 32)->default('');
			$table->string('fax', 32)->default('');
			$table->string('shipping_firstname', 32);
			$table->string('shipping_lastname', 32)->default('');
			$table->string('shipping_company', 32);
			$table->string('shipping_address_1', 128);
			$table->string('shipping_address_2', 128);
			$table->string('shipping_city', 128);
			$table->string('shipping_postcode', 10)->default('');
			$table->string('shipping_country', 128);
			$table->integer('shipping_country_id');
			$table->string('shipping_zone', 128);
			$table->integer('shipping_zone_id');
			$table->text('shipping_address_format', 65535);
			$table->string('shipping_method', 128)->default('');
			$table->string('payment_firstname', 32)->default('');
			$table->string('payment_lastname', 32)->default('');
			$table->string('payment_company', 32);
			$table->string('payment_address_1', 128);
			$table->string('payment_address_2', 128);
			$table->string('payment_city', 128);
			$table->string('payment_postcode', 10)->default('');
			$table->string('payment_country', 128);
			$table->integer('payment_country_id');
			$table->string('payment_zone', 128);
			$table->integer('payment_zone_id');
			$table->text('payment_address_format', 65535);
			$table->string('payment_method', 128)->default('');
			$table->text('comment', 65535);
			$table->decimal('total', 15, 4)->default(0.0000);
			$table->integer('reward');
			$table->integer('order_status_id')->default(0);
			$table->integer('affiliate_id');
			$table->decimal('commission', 15, 4);
			$table->integer('language_id');
			$table->integer('currency_id');
			$table->string('currency_code', 3);
			$table->decimal('currency_value', 15, 8);
			$table->dateTime('date_added');
			$table->dateTime('date_modified');
			$table->string('ip', 15)->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_order');
	}

}
