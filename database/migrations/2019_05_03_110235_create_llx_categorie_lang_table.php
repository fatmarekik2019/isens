<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCategorieLangTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_categorie_lang', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_category')->default(0);
			$table->string('lang', 5)->default('0');
			$table->string('label');
			$table->text('description', 65535)->nullable();
			$table->unique(['fk_category','lang'], 'uk_category_lang');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_categorie_lang');
	}

}
