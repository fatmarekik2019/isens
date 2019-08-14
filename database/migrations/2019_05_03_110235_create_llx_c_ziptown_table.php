<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCZiptownTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_ziptown', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('code', 5)->nullable();
			$table->integer('fk_county')->nullable()->index('idx_c_ziptown_fk_county');
			$table->integer('fk_pays')->default(0)->index('idx_c_ziptown_fk_pays');
			$table->string('zip', 10)->index('idx_c_ziptown_zip');
			$table->string('town');
			$table->boolean('active')->default(1);
			$table->unique(['zip','town','fk_pays'], 'uk_ziptown_fk_pays');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_c_ziptown');
	}

}
