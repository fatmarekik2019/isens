<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencProductDescriptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_product_description', function(Blueprint $table)
		{
			$table->integer('product_id');
			$table->integer('language_id');
			$table->string('name');
			$table->text('description', 65535);
			$table->string('meta_description');
			$table->string('meta_keyword');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_product_description');
	}

}
