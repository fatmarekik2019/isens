<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxProductLangTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_product_lang', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->integer('fk_product')->default(0);
			$table->string('lang', 5)->default('0');
			$table->string('label');
			$table->text('description', 65535)->nullable();
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
		Schema::drop('llx_product_lang');
	}

}
