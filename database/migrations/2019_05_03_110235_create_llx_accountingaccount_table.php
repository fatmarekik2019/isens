<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxAccountingaccountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_accountingaccount', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('entity')->default(1);
			$table->dateTime('datec');
			$table->string('fk_pcg_version', 12)->index('idx_accountingaccount_fk_pcg_version');
			$table->string('pcg_type', 20);
			$table->string('pcg_subtype', 20);
			$table->string('account_number', 20);
			$table->string('account_parent', 20)->nullable();
			$table->string('label')->nullable();
			$table->integer('fk_user_author')->nullable();
			$table->integer('fk_user_modif')->nullable();
			$table->boolean('active')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_accountingaccount');
	}

}
