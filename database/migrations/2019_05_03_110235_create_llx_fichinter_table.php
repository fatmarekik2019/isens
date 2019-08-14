<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxFichinterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_fichinter', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_soc')->index('idx_fichinter_fk_soc');
			$table->integer('fk_projet')->nullable()->default(0);
			$table->integer('fk_contrat')->nullable()->default(0);
			$table->string('ref', 30);
			$table->integer('entity')->default(1);
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('datec')->nullable();
			$table->dateTime('date_valid')->nullable();
			$table->date('datei')->nullable();
			$table->integer('fk_user_author')->nullable();
			$table->integer('fk_user_valid')->nullable();
			$table->smallInteger('fk_statut')->nullable()->default(0);
			$table->float('duree', 10, 0)->nullable();
			$table->text('description', 65535)->nullable();
			$table->text('note_private', 65535)->nullable();
			$table->text('note_public', 65535)->nullable();
			$table->string('model_pdf')->nullable();
			$table->string('extraparams')->nullable();
			$table->unique(['ref','entity'], 'uk_fichinter_ref');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_fichinter');
	}

}
