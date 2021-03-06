<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCEquipementEtatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_equipement_etat', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('code', 16);
			$table->integer('entity')->default(1);
			$table->string('libelle', 50);
			$table->string('coder', 16);
			$table->integer('active')->default(1);
			$table->unique(['code','entity'], 'uk_c_equipement_etat');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_c_equipement_etat');
	}

}
