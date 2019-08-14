<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxMylistButtonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_mylist_button', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_mylist');
			$table->string('label', 30);
			$table->text('description', 65535)->nullable();
			$table->integer('posbutton')->nullable();
			$table->integer('active')->nullable();
			$table->text('perms', 65535)->nullable();
			$table->text('querybutton', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_mylist_button');
	}

}
