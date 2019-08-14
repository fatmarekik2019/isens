<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxCronjobTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_cronjob', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('datec')->nullable();
			$table->string('jobtype', 10);
			$table->text('label', 65535);
			$table->string('command')->nullable();
			$table->string('classesname')->nullable();
			$table->string('objectname')->nullable();
			$table->string('methodename')->nullable();
			$table->text('params', 65535);
			$table->string('md5params', 32)->nullable();
			$table->string('module_name')->nullable();
			$table->integer('priority')->nullable()->default(0);
			$table->dateTime('datelastrun')->nullable();
			$table->dateTime('datenextrun')->nullable();
			$table->dateTime('datestart')->nullable();
			$table->dateTime('dateend')->nullable();
			$table->dateTime('datelastresult')->nullable();
			$table->text('lastresult', 65535)->nullable();
			$table->text('lastoutput', 65535)->nullable();
			$table->integer('unitfrequency')->default(0);
			$table->integer('frequency')->default(0);
			$table->integer('nbrun')->nullable();
			$table->integer('status')->default(1);
			$table->integer('fk_user_author')->nullable();
			$table->integer('fk_user_mod')->nullable();
			$table->text('note', 65535)->nullable();
			$table->string('libname')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_cronjob');
	}

}
