<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencAffiliateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_affiliate', function(Blueprint $table)
		{
			$table->integer('affiliate_id');
			$table->string('firstname', 32)->default('');
			$table->string('lastname', 32)->default('');
			$table->string('email', 96)->default('');
			$table->string('telephone', 32)->default('');
			$table->string('fax', 32)->default('');
			$table->string('password', 40)->default('');
			$table->string('company', 32);
			$table->string('website');
			$table->string('address_1', 128)->default('');
			$table->string('address_2', 128);
			$table->string('city', 128)->default('');
			$table->string('postcode', 10)->default('');
			$table->integer('country_id');
			$table->integer('zone_id');
			$table->string('code', 64);
			$table->decimal('commission', 4)->default(0.00);
			$table->string('tax', 64);
			$table->string('payment', 6);
			$table->string('cheque', 100)->default('');
			$table->string('paypal', 64)->default('');
			$table->string('bank_name', 64)->default('');
			$table->string('bank_branch_number', 64)->default('');
			$table->string('bank_swift_code', 64)->default('');
			$table->string('bank_account_name', 64)->default('');
			$table->string('bank_account_number', 64)->default('');
			$table->string('ip', 15);
			$table->boolean('status');
			$table->boolean('approved');
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
		Schema::drop('openc_affiliate');
	}

}
