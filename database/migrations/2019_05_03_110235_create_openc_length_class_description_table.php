<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencLengthClassDescriptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_length_class_description', function(Blueprint $table)
		{
			$table->integer('length_class_id');
			$table->integer('language_id');
			$table->string('title', 32);
			$table->string('unit', 4);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_length_class_description');
	}

}
