<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxProjetTaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_projet_task', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->string('ref', 50)->nullable();
			$table->integer('entity')->default(1);
			$table->integer('fk_projet');
			$table->integer('fk_task_parent')->default(0);
			$table->dateTime('datec')->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('dateo')->nullable();
			$table->dateTime('datee')->nullable();
			$table->dateTime('datev')->nullable();
			$table->string('label');
			$table->text('description', 65535)->nullable();
			$table->float('duration_effective', 10, 0)->default(0);
			$table->float('planned_workload', 10, 0)->default(0);
			$table->integer('progress')->nullable()->default(0);
			$table->integer('priority')->nullable()->default(0);
			$table->integer('fk_user_creat')->nullable();
			$table->integer('fk_user_valid')->nullable();
			$table->smallInteger('fk_statut')->default(0);
			$table->text('note_private', 65535)->nullable();
			$table->text('note_public', 65535)->nullable();
			$table->integer('rang')->nullable()->default(0);
			$table->string('model_pdf')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_projet_task');
	}

}
