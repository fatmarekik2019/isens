<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIsensEtatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('isens_etats', function(Blueprint $table)
		{
			$table->integer('Id')->primary();
			$table->string('State');
			$table->string('Code');
			$table->boolean('Selectable');
			$table->integer('fk_etatequipement')->nullable();
			$table->integer('fk_statut')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('isens_etats');
	}

}
