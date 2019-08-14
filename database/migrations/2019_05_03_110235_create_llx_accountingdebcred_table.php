<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxAccountingdebcredTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_accountingdebcred', function(Blueprint $table)
		{
			$table->integer('fk_transaction');
			$table->string('account_number', 20);
			$table->float('amount', 10, 0);
			$table->string('direction', 1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_accountingdebcred');
	}

}
