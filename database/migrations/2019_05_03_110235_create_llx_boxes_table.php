<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxBoxesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_boxes', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('entity')->default(1);
			$table->integer('box_id')->index('idx_boxes_boxid');
			$table->smallInteger('position');
			$table->string('box_order', 3);
			$table->integer('fk_user')->default(0)->index('idx_boxes_fk_user');
			$table->integer('maxline')->nullable();
			$table->string('params')->nullable();
			$table->unique(['entity','box_id','position','fk_user'], 'uk_boxes');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_boxes');
	}

}
