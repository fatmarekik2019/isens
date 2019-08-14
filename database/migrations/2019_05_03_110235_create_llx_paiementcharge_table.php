<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxPaiementchargeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_paiementcharge', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_charge')->nullable();
			$table->dateTime('datec')->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('datep')->nullable();
			$table->float('amount', 10, 0)->nullable()->default(0);
			$table->integer('fk_typepaiement');
			$table->string('num_paiement', 50)->nullable();
			$table->text('note', 65535)->nullable();
			$table->integer('fk_bank');
			$table->integer('fk_user_creat')->nullable();
			$table->integer('fk_user_modif')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_paiementcharge');
	}

}
