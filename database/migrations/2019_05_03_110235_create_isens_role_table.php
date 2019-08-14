<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIsensRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('isens_role', function(Blueprint $table)
		{
			$table->integer('Id')->primary();
			$table->string('Name', 22);
			$table->smallInteger('isAdmin');
			$table->smallInteger('isCompanyResp');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('isens_role');
	}

}
