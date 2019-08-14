<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxUsergroupUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_usergroup_user', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->integer('entity')->default(1);
			$table->integer('fk_user');
			$table->integer('fk_usergroup');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_usergroup_user');
	}

}
