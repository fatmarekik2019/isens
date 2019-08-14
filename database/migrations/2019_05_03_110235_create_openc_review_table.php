<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencReviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_review', function(Blueprint $table)
		{
			$table->integer('review_id');
			$table->integer('product_id');
			$table->integer('customer_id');
			$table->string('author', 64)->default('');
			$table->text('text', 65535);
			$table->integer('rating');
			$table->boolean('status')->default(0);
			$table->dateTime('date_added')->default('0000-00-00 00:00:00');
			$table->dateTime('date_modified')->default('0000-00-00 00:00:00');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_review');
	}

}
