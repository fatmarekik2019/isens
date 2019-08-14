<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxResourceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_resource', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->integer('entity')->nullable();
			$table->string('ref')->nullable();
			$table->text('description', 65535)->nullable();
			$table->string('fk_code_type_resource', 32)->nullable();
			$table->text('note_public', 65535)->nullable();
			$table->text('note_private', 65535)->nullable();
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
		Schema::drop('llx_resource');
	}

}
