<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxSocieteRemiseExceptTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_societe_remise_except', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->integer('fk_soc');
			$table->dateTime('datec')->nullable();
			$table->float('amount_ht', 24, 8);
			$table->float('amount_tva', 24, 8)->default(0.00000000);
			$table->float('amount_ttc', 24, 8)->default(0.00000000);
			$table->float('tva_tx', 6, 3)->default(0.000);
			$table->integer('fk_user');
			$table->integer('fk_facture_line')->nullable();
			$table->integer('fk_facture')->nullable();
			$table->integer('fk_facture_source')->nullable();
			$table->string('description');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_societe_remise_except');
	}

}
