<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpencTaxRateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openc_tax_rate', function(Blueprint $table)
		{
			$table->integer('tax_rate_id');
			$table->integer('geo_zone_id')->default(0);
			$table->integer('tax_class_id');
			$table->integer('priority')->default(1);
			$table->decimal('rate', 7, 4)->default(0.0000);
			$table->string('description')->default('');
			$table->dateTime('date_modified')->default('0000-00-00 00:00:00');
			$table->dateTime('date_added')->default('0000-00-00 00:00:00');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openc_tax_rate');
	}

}
