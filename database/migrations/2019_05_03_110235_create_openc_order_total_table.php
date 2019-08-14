<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencOrderTotalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_order_total', function(Blueprint $table)
		{
			$table->integer('order_total_id');
			$table->integer('order_id');
			$table->string('code', 32);
			$table->string('title')->default('');
			$table->string('text')->default('');
			$table->decimal('value', 15, 4)->default(0.0000);
			$table->integer('sort_order');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_order_total');
	}

}
