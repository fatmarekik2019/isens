<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBackupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('backups', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->timestamp('date_time')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('file');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('backups');
	}

}
