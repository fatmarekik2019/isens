<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxPaiementFactureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_paiement_facture', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_paiement')->nullable()->index('idx_paiement_facture_fk_paiement');
			$table->integer('fk_facture')->nullable()->index('idx_paiement_facture_fk_facture');
			$table->float('amount', 24, 8)->nullable()->default(0.00000000);
			$table->unique(['fk_paiement','fk_facture'], 'uk_paiement_facture');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_paiement_facture');
	}

}
