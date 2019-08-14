<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxLinksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_links', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('entity')->default(1);
			$table->dateTime('datea');
			$table->string('url');
			$table->string('label');
			$table->string('objecttype');
			$table->integer('objectid');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_links');
	}

}
