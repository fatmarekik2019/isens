<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCategorieMemberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_categorie_member', function(Blueprint $table)
		{
			$table->integer('fk_categorie')->index('idx_categorie_member_fk_categorie');
			$table->integer('fk_member')->index('idx_categorie_member_fk_member');
			$table->primary(['fk_categorie','fk_member']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_categorie_member');
	}

}
