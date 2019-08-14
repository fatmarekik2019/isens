<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxPaiementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_paiement', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('entity')->default(1);
			$table->dateTime('datec')->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('datep')->nullable();
			$table->float('amount', 24, 8)->nullable()->default(0.00000000);
			$table->integer('fk_paiement');
			$table->string('num_paiement', 50)->nullable();
			$table->text('note', 65535)->nullable();
			$table->integer('fk_bank')->default(0);
			$table->integer('fk_user_creat')->nullable();
			$table->integer('fk_user_modif')->nullable();
			$table->smallInteger('statut')->default(0);
			$table->integer('fk_export_compta')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_paiement');
	}

}
