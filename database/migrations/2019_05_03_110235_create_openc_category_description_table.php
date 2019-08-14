<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencCategoryDescriptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_category_description', function(Blueprint $table)
		{
			$table->integer('category_id');
			$table->integer('language_id');
			$table->string('name')->default('');
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
		Schema::drop('openc_category_description');
	}

}
