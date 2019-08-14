<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxPrelevementFactureDemandeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_prelevement_facture_demande', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_facture');
			$table->float('amount', 10, 0);
			$table->dateTime('date_demande');
			$table->smallInteger('traite')->nullable()->default(0);
			$table->dateTime('date_traite')->nullable();
			$table->integer('fk_prelevement_bons')->nullable();
			$table->integer('fk_user_demande');
			$table->string('code_banque', 7)->nullable();
			$table->string('code_guichet', 6)->nullable();
			$table->string('number')->nullable();
			$table->string('cle_rib', 5)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_prelevement_facture_demande');
	}

}
