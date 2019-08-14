<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxBankTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_bank', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->dateTime('datec')->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->date('datev')->nullable()->index('idx_bank_datev');
			$table->date('dateo')->nullable()->index('idx_bank_dateo');
			$table->float('amount', 24, 8)->default(0.00000000);
			$table->string('label')->nullable();
			$table->integer('fk_account')->nullable()->index('idx_bank_fk_account');
			$table->integer('fk_user_author')->nullable();
			$table->integer('fk_user_rappro')->nullable();
			$table->string('fk_type', 6)->nullable();
			$table->string('num_releve', 50)->nullable();
			$table->string('num_chq', 50)->nullable();
			$table->boolean('rappro')->nullable()->default(0)->index('idx_bank_rappro');
			$table->text('note', 65535)->nullable();
			$table->integer('fk_bordereau')->nullable()->default(0);
			$table->string('banque')->nullable();
			$table->string('emetteur')->nullable();
			$table->string('author', 40)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_bank');
	}

}
