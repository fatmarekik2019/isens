<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencReturnProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_return_product', function(Blueprint $table)
		{
			$table->integer('return_product_id');
			$table->integer('return_id');
			$table->integer('product_id');
			$table->string('name');
			$table->string('model', 64);
			$table->integer('quantity');
			$table->integer('return_reason_id');
			$table->boolean('opened');
			$table->text('comment', 65535);
			$table->integer('return_action_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_return_product');
	}

}
