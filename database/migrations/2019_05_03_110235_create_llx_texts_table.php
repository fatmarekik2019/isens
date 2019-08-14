<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxTextsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_texts', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->string('module', 32)->nullable();
			$table->string('typemodele', 32)->nullable();
			$table->smallInteger('sortorder')->nullable();
			$table->smallInteger('private')->default(0);
			$table->integer('fk_user')->nullable();
			$table->string('title', 128)->nullable();
			$table->string('filename', 128)->nullable();
			$table->text('content', 65535)->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_texts');
	}

}
