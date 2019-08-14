<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxMylistTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_mylist', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('code', 30)->unique('uk_mylist_code');
			$table->string('label', 50);
			$table->text('description', 65535)->nullable();
			$table->string('titlemenu', 20)->nullable();
			$table->string('mainmenu', 50)->nullable();
			$table->string('leftmenu', 50)->nullable();
			$table->string('posmenu', 50)->nullable()->default('100');
			$table->string('elementtab', 50)->nullable();
			$table->string('author', 50)->nullable();
			$table->integer('active')->nullable();
			$table->text('perms', 65535)->nullable();
			$table->text('langs', 65535)->nullable();
			$table->text('fieldinit', 65535)->nullable();
			$table->text('fieldused', 65535)->nullable();
			$table->text('querylist', 65535)->nullable();
			$table->text('querydo', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_mylist');
	}

}
