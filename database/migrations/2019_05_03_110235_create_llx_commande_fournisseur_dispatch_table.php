<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCommandeFournisseurDispatchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_commande_fournisseur_dispatch', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_commande')->nullable()->index('idx_commande_fournisseur_dispatch_fk_commande');
			$table->integer('fk_product')->nullable();
			$table->float('qty', 10, 0)->nullable();
			$table->integer('fk_entrepot')->nullable();
			$table->integer('fk_user')->nullable();
			$table->dateTime('datec')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_commande_fournisseur_dispatch');
	}

}
