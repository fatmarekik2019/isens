<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxEcmDirectoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_ecm_directories', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('label', 64);
			$table->integer('entity')->default(1);
			$table->integer('fk_parent')->nullable();
			$table->string('description');
			$table->integer('cachenbofdoc')->default(0);
			$table->string('fullpath')->nullable();
			$table->string('extraparams')->nullable();
			$table->dateTime('date_c')->nullable();
			$table->timestamp('date_m')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('fk_user_c')->nullable()->index('idx_ecm_directories_fk_user_c');
			$table->integer('fk_user_m')->nullable()->index('idx_ecm_directories_fk_user_m');
			$table->text('acl', 65535)->nullable();
			$table->unique(['label','fk_parent','entity'], 'idx_ecm_directories');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_ecm_directories');
	}

}
