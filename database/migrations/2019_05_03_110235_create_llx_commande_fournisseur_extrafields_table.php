<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCommandeFournisseurExtrafieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_commande_fournisseur_extrafields', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('fk_object')->index('idx_commande_fournisseur_extrafields');
			$table->string('import_key', 14)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_commande_fournisseur_extrafields');
	}

}
