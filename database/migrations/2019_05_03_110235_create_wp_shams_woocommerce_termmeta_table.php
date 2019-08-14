<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpShamsWoocommerceTermmetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_shams_woocommerce_termmeta', function(Blueprint $table)
		{
			$table->bigInteger('meta_id');
			$table->bigInteger('woocommerce_term_id');
			$table->string('meta_key')->nullable();
			$table->text('meta_value')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_shams_woocommerce_termmeta');
	}

}
