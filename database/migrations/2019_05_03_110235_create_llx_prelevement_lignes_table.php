<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxPrelevementLignesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_prelevement_lignes', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_prelevement_bons')->nullable()->index('idx_prelevement_lignes_fk_prelevement_bons');
			$table->integer('fk_soc');
			$table->smallInteger('statut')->nullable()->default(0);
			$table->string('client_nom')->nullable();
			$table->float('amount', 10, 0)->nullable()->default(0);
			$table->string('code_banque', 7)->nullable();
			$table->string('code_guichet', 6)->nullable();
			$table->string('number')->nullable();
			$table->string('cle_rib', 5)->nullable();
			$table->text('note', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_prelevement_lignes');
	}

}
