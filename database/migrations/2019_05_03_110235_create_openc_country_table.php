<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencCountryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_country', function(Blueprint $table)
		{
			$table->integer('country_id');
			$table->string('name', 128);
			$table->string('iso_code_2', 2)->default('');
			$table->string('iso_code_3', 3)->default('');
			$table->text('address_format', 65535);
			$table->boolean('postcode_required');
			$table->boolean('status')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_country');
	}

}
