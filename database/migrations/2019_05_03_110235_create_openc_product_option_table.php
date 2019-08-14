<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencProductOptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_product_option', function(Blueprint $table)
		{
			$table->integer('product_option_id');
			$table->integer('product_id');
			$table->integer('option_id');
			$table->text('option_value', 65535);
			$table->boolean('required');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_product_option');
	}

}
