<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencCurrencyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_currency', function(Blueprint $table)
		{
			$table->integer('currency_id');
			$table->string('title', 32)->default('');
			$table->string('code', 3)->default('');
			$table->string('symbol_left', 12);
			$table->string('symbol_right', 12);
			$table->char('decimal_place', 1);
			$table->float('value', 15, 8);
			$table->boolean('status');
			$table->dateTime('date_modified')->default('0000-00-00 00:00:00');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_currency');
	}

}
