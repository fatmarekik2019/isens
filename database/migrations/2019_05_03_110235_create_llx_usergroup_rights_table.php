<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxUsergroupRightsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_usergroup_rights', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->integer('fk_usergroup');
			$table->integer('fk_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_usergroup_rights');
	}

}
