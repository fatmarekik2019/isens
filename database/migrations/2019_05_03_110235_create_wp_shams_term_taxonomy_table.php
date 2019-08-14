<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpShamsTermTaxonomyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_shams_term_taxonomy', function(Blueprint $table)
		{
			$table->bigInteger('term_taxonomy_id')->unsigned();
			$table->bigInteger('term_id')->unsigned()->default(0);
			$table->string('taxonomy', 32)->default('');
			$table->text('description');
			$table->bigInteger('parent')->unsigned()->default(0);
			$table->bigInteger('count')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_shams_term_taxonomy');
	}

}
