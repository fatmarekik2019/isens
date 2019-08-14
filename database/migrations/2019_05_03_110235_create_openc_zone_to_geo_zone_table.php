<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencZoneToGeoZoneTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_zone_to_geo_zone', function(Blueprint $table)
		{
			$table->integer('zone_to_geo_zone_id');
			$table->integer('country_id');
			$table->integer('zone_id')->default(0);
			$table->integer('geo_zone_id');
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
		Schema::drop('openc_zone_to_geo_zone');
	}

}
