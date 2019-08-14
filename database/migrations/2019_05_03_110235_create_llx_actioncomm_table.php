<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxActioncommTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_actioncomm', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('ref_ext', 128)->nullable();
			$table->integer('entity')->default(1);
			$table->dateTime('datep')->nullable();
			$table->dateTime('datep2')->nullable();
			$table->dateTime('datea')->nullable()->index('idx_actioncomm_datea');
			$table->dateTime('datea2')->nullable();
			$table->integer('fk_action')->nullable();
			$table->string('code', 32)->nullable();
			$table->string('label', 128);
			$table->dateTime('datec')->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('fk_user_author')->nullable();
			$table->integer('fk_user_mod')->nullable();
			$table->integer('fk_project')->nullable();
			$table->integer('fk_soc')->nullable()->index('idx_actioncomm_fk_soc');
			$table->integer('fk_contact')->nullable()->index('idx_actioncomm_fk_contact');
			$table->integer('fk_parent')->default(0);
			$table->integer('fk_user_action')->nullable();
			$table->integer('transparency')->nullable();
			$table->integer('fk_user_done')->nullable();
			$table->smallInteger('priority')->nullable();
			$table->smallInteger('fulldayevent')->default(0);
			$table->smallInteger('punctual')->default(1);
			$table->smallInteger('percent')->default(0);
			$table->string('location', 128)->nullable();
			$table->float('durationp', 10, 0)->nullable();
			$table->float('durationa', 10, 0)->nullable();
			$table->text('note', 65535)->nullable();
			$table->integer('fk_element')->nullable();
			$table->string('elementtype', 32)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_actioncomm');
	}

}
