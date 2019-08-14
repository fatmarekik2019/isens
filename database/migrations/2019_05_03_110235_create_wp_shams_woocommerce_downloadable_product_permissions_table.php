<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpShamsWoocommerceDownloadableProductPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_shams_woocommerce_downloadable_product_permissions', function(Blueprint $table)
		{
			$table->bigInteger('permission_id');
			$table->string('download_id', 32);
			$table->bigInteger('product_id');
			$table->bigInteger('order_id')->default(0);
			$table->string('order_key', 200);
			$table->string('user_email', 200);
			$table->bigInteger('user_id')->nullable();
			$table->string('downloads_remaining', 9)->nullable();
			$table->dateTime('access_granted')->default('0000-00-00 00:00:00');
			$table->dateTime('access_expires')->nullable();
			$table->bigInteger('download_count')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_shams_woocommerce_downloadable_product_permissions');
	}

}
