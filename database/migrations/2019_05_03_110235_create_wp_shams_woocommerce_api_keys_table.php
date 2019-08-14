<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpShamsWoocommerceApiKeysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_shams_woocommerce_api_keys', function(Blueprint $table)
		{
			$table->bigInteger('key_id');
			$table->bigInteger('user_id');
			$table->text('description')->nullable();
			$table->string('permissions', 10);
			$table->char('consumer_key', 64);
			$table->char('consumer_secret', 43);
			$table->text('nonces')->nullable();
			$table->char('truncated_key', 7);
			$table->dateTime('last_access')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_shams_woocommerce_api_keys');
	}

}
