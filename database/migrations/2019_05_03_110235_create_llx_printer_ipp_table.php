<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxPrinterIppTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_printer_ipp', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('datec')->nullable();
			$table->text('printer_name', 65535);
			$table->text('printer_location', 65535);
			$table->string('printer_uri');
			$table->integer('copy')->default(1);
			$table->string('module', 16);
			$table->string('login', 32);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_printer_ipp');
	}

}
