<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCPaperFormatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_paper_format', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('code', 16);
			$table->string('label', 50);
			$table->float('width', 6)->nullable()->default(0.00);
			$table->float('height', 6)->nullable()->default(0.00);
			$table->string('unit', 5);
			$table->boolean('active')->default(1);
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
		Schema::drop('llx_c_paper_format');
	}

}
