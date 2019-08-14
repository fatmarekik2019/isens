<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencReturnTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_return', function(Blueprint $table)
		{
			$table->integer('return_id');
			$table->integer('order_id');
			$table->date('date_ordered');
			$table->integer('customer_id');
			$table->string('firstname', 32);
			$table->string('lastname', 32);
			$table->string('email', 96);
			$table->string('telephone', 32);
			$table->integer('return_status_id');
			$table->text('comment', 65535)->nullable();
			$table->dateTime('date_added');
			$table->dateTime('date_modified');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_return');
	}

}
