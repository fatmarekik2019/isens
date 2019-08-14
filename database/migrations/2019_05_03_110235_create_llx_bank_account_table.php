<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxBankAccountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_bank_account', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->dateTime('datec')->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('ref', 12);
			$table->string('label', 30);
			$table->integer('entity')->default(1);
			$table->string('bank', 60)->nullable();
			$table->string('code_banque', 8)->nullable();
			$table->string('code_guichet', 6)->nullable();
			$table->string('number')->nullable();
			$table->string('cle_rib', 5)->nullable();
			$table->string('bic', 11)->nullable();
			$table->string('iban_prefix', 34)->nullable();
			$table->string('country_iban', 2)->nullable();
			$table->string('cle_iban', 2)->nullable();
			$table->string('domiciliation')->nullable();
			$table->string('state_id', 50)->nullable();
			$table->integer('fk_pays');
			$table->string('proprio', 60)->nullable();
			$table->text('owner_address', 65535)->nullable();
			$table->smallInteger('courant')->default(0);
			$table->smallInteger('clos')->default(0);
			$table->smallInteger('rappro')->nullable()->default(1);
			$table->string('url', 128)->nullable();
			$table->string('account_number', 24)->nullable();
			$table->string('currency_code', 3);
			$table->integer('min_allowed')->nullable()->default(0);
			$table->integer('min_desired')->nullable()->default(0);
			$table->text('comment', 65535)->nullable();
			$table->unique(['label','entity'], 'uk_bank_account_label');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_bank_account');
	}

}
