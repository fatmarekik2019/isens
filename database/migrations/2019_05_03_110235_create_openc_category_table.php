<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_category', function(Blueprint $table)
		{
			$table->integer('category_id');
			$table->string('image')->nullable();
			$table->integer('parent_id')->default(0);
			$table->boolean('top');
			$table->integer('column');
			$table->integer('sort_order')->default(0);
			$table->boolean('status');
			$table->dateTime('date_added')->default('0000-00-00 00:00:00');
			$table->dateTime('date_modified')->default('0000-00-00 00:00:00');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_category');
	}

}
