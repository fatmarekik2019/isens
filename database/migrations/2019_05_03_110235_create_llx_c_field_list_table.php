<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCFieldListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_c_field_list', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('element', 64);
			$table->integer('entity')->default(1);
			$table->string('name', 32);
			$table->string('alias', 32);
			$table->string('title', 32);
			$table->string('align', 6)->nullable()->default('left');
			$table->boolean('sort')->default(1);
			$table->boolean('search')->default(0);
			$table->string('enabled')->nullable()->default('1');
			$table->integer('rang')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_c_field_list');
	}

}
