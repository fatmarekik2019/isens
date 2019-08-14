<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxComptaCompteGenerauxTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_compta_compte_generaux', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->dateTime('date_creation')->nullable();
			$table->string('numero', 50)->nullable()->unique('numero');
			$table->string('intitule')->nullable();
			$table->integer('fk_user_author')->nullable();
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
		Schema::drop('llx_compta_compte_generaux');
	}

}
