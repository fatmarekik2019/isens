<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpShamsWoocommerceTaxRateLocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_shams_woocommerce_tax_rate_locations', function(Blueprint $table)
		{
			$table->bigInteger('location_id');
			$table->string('location_code');
			$table->bigInteger('tax_rate_id');
			$table->string('location_type', 40);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_shams_woocommerce_tax_rate_locations');
	}

}
