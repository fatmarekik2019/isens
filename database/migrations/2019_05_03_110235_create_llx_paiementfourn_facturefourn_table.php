<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxPaiementfournFacturefournTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_paiementfourn_facturefourn', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_paiementfourn')->nullable()->index('idx_paiementfourn_facturefourn_fk_paiement');
			$table->integer('fk_facturefourn')->nullable()->index('idx_paiementfourn_facturefourn_fk_facture');
			$table->float('amount', 24, 8)->nullable()->default(0.00000000);
			$table->unique(['fk_paiementfourn','fk_facturefourn'], 'uk_paiementfourn_facturefourn');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_paiementfourn_facturefourn');
	}

}
