<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCategorieSocieteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_categorie_societe', function(Blueprint $table)
		{
			$table->integer('fk_categorie')->index('idx_categorie_societe_fk_categorie');
			$table->integer('fk_societe')->index('idx_categorie_societe_fk_societe');
			$table->string('import_key', 14)->nullable();
			$table->primary(['fk_categorie','fk_societe']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_categorie_societe');
	}

}
