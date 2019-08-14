<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencProductTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_product_tag', function(Blueprint $table)
		{
			$table->integer('product_tag_id');
			$table->integer('product_id');
			$table->integer('language_id');
			$table->string('tag', 32);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_product_tag');
	}

}
