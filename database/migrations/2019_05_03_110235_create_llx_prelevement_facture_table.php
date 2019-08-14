<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxPrelevementFactureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_prelevement_facture', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_facture');
			$table->integer('fk_prelevement_lignes')->index('idx_prelevement_facture_fk_prelevement_lignes');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_prelevement_facture');
	}

}
