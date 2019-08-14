<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxPaiementfournTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_paiementfourn', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('datec')->nullable();
			$table->dateTime('datep')->nullable();
			$table->float('amount', 10, 0)->nullable()->default(0);
			$table->integer('fk_user_author')->nullable();
			$table->integer('fk_paiement');
			$table->string('num_paiement', 50)->nullable();
			$table->text('note', 65535)->nullable();
			$table->integer('fk_bank');
			$table->smallInteger('statut')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_paiementfourn');
	}

}
