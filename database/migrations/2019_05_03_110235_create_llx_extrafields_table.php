<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxExtrafieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_extrafields', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('name', 64);
			$table->integer('entity')->default(1);
			$table->string('elementtype', 64)->default('member');
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('label');
			$table->string('type', 8)->nullable();
			$table->string('size', 8)->nullable();
			$table->integer('fieldunique')->nullable()->default(0);
			$table->integer('fieldrequired')->nullable()->default(0);
			$table->integer('pos')->nullable()->default(0);
			$table->text('param', 65535)->nullable();
			$table->unique(['name','entity','elementtype'], 'uk_extrafields_name');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_extrafields');
	}

}
