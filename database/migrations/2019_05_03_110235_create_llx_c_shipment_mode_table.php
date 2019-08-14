<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCShipmentModeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_shipment_mode', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('code', 30);
			$table->string('libelle', 50);
			$table->text('description', 65535)->nullable();
			$table->string('tracking')->default('');
			$table->boolean('active')->nullable()->default(0);
			$table->string('module', 32)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_c_shipment_mode');
	}

}
