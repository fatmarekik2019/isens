<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencGeoZoneTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_geo_zone', function(Blueprint $table)
		{
			$table->integer('geo_zone_id');
			$table->string('name', 32)->default('');
			$table->string('description')->default('');
			$table->dateTime('date_modified')->default('0000-00-00 00:00:00');
			$table->dateTime('date_added')->default('0000-00-00 00:00:00');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_geo_zone');
	}

}
