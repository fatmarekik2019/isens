<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpTermsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_terms', function(Blueprint $table)
		{
			$table->bigInteger('term_id')->unsigned();
			$table->string('name', 200)->default('');
			$table->string('slug', 200)->default('');
			$table->bigInteger('term_group')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_terms');
	}

}
