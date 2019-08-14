<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxProjetTaskTimeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_projet_task_time', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->integer('fk_task');
			$table->date('task_date')->nullable();
			$table->float('task_duration', 10, 0)->nullable();
			$table->integer('fk_user')->nullable();
			$table->float('thm', 24, 8)->nullable();
			$table->text('note', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_projet_task_time');
	}

}
