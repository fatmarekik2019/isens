<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWpTermRelationshipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wp_term_relationships', function(Blueprint $table)
		{
			$table->bigInteger('object_id')->unsigned()->default(0);
			$table->bigInteger('term_taxonomy_id')->unsigned()->default(0);
			$table->integer('term_order')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wp_term_relationships');
	}

}