<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCategorieContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_categorie_contact', function(Blueprint $table)
		{
			$table->integer('fk_categorie')->index('idx_categorie_contact_fk_categorie');
			$table->integer('fk_socpeople')->index('idx_categorie_contact_fk_socpeople');
			$table->string('import_key', 14)->nullable();
			$table->primary(['fk_categorie','fk_socpeople']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_categorie_contact');
	}

}
