<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxBankClassTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_bank_class', function(Blueprint $table)
		{
			$table->integer('lineid');
			$table->integer('fk_categ');
			$table->unique(['lineid','fk_categ'], 'uk_bank_class_lineid');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_bank_class');
	}

}
