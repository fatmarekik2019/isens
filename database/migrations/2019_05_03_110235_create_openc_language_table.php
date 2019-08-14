<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencLanguageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_language', function(Blueprint $table)
		{
			$table->integer('language_id');
			$table->string('name', 32)->default('');
			$table->string('code', 5);
			$table->string('locale');
			$table->string('image', 64);
			$table->string('directory', 32)->default('');
			$table->string('filename', 64)->default('');
			$table->integer('sort_order')->default(0);
			$table->boolean('status');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_language');
	}

}
