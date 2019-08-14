<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxBookmarkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_bookmark', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_soc')->nullable();
			$table->integer('fk_user');
			$table->dateTime('dateb')->nullable();
			$table->string('url');
			$table->string('target', 16)->nullable();
			$table->string('title', 64)->nullable();
			$table->string('favicon', 24)->nullable();
			$table->integer('position')->nullable()->default(0);
			$table->integer('entity')->default(1);
			$table->unique(['fk_user','url'], 'uk_bookmark_url');
			$table->unique(['fk_user','title'], 'uk_bookmark_title');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_bookmark');
	}

}
