<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencManufacturerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_manufacturer', function(Blueprint $table)
		{
			$table->integer('manufacturer_id');
			$table->string('name', 64)->default('');
			$table->string('image')->nullable();
			$table->integer('sort_order');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_manufacturer');
	}

}
