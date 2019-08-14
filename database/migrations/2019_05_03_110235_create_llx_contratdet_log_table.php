<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxContratdetLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_contratdet_log', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('fk_contratdet')->index('idx_contratdet_log_fk_contratdet');
			$table->dateTime('date')->index('idx_contratdet_log_date');
			$table->smallInteger('statut');
			$table->integer('fk_user_author');
			$table->text('commentaire', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_contratdet_log');
	}

}
