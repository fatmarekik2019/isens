<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencWeightClassDescriptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_weight_class_description', function(Blueprint $table)
		{
			$table->integer('weight_class_id');
			$table->integer('language_id');
			$table->string('title', 32);
			$table->string('unit', 4)->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_weight_class_description');
	}

}
