<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpShamsWoocommerceTaxRatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_shams_woocommerce_tax_rates', function(Blueprint $table)
		{
			$table->bigInteger('tax_rate_id');
			$table->string('tax_rate_country', 200)->default('');
			$table->string('tax_rate_state', 200)->default('');
			$table->string('tax_rate', 200)->default('');
			$table->string('tax_rate_name', 200)->default('');
			$table->bigInteger('tax_rate_priority');
			$table->integer('tax_rate_compound')->default(0);
			$table->integer('tax_rate_shipping')->default(1);
			$table->bigInteger('tax_rate_order');
			$table->string('tax_rate_class', 200)->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_shams_woocommerce_tax_rates');
	}

}
