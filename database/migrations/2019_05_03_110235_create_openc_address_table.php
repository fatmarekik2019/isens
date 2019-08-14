<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_address', function(Blueprint $table)
		{
			$table->integer('address_id');
			$table->integer('customer_id');
			$table->string('firstname', 32)->default('');
			$table->string('lastname', 32)->default('');
			$table->string('company', 32);
			$table->string('address_1', 128);
			$table->string('address_2', 128);
			$table->string('city', 128);
			$table->string('postcode', 10);
			$table->integer('country_id')->default(0);
			$table->integer('zone_id')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_address');
	}

}
