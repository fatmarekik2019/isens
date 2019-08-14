<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencOrderDownloadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_order_download', function(Blueprint $table)
		{
			$table->integer('order_download_id');
			$table->integer('order_id');
			$table->integer('order_product_id');
			$table->string('name', 64)->default('');
			$table->string('filename', 128)->default('');
			$table->string('mask', 128)->default('');
			$table->integer('remaining')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_order_download');
	}

}
