<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpShamsOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_shams_options', function(Blueprint $table)
		{
			$table->bigInteger('option_id')->unsigned();
			$table->string('option_name', 191)->default('');
			$table->text('option_value');
			$table->string('autoload', 20)->default('yes');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_shams_options');
	}

}
