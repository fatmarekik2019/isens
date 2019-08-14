<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxDeplacementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_deplacement', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('ref', 30)->nullable();
			$table->integer('entity')->default(1);
			$table->dateTime('datec');
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('dated')->nullable();
			$table->integer('fk_user');
			$table->integer('fk_user_author')->nullable();
			$table->integer('fk_user_modif')->nullable();
			$table->string('type', 12);
			$table->integer('fk_statut')->default(1);
			$table->float('km', 10, 0)->nullable();
			$table->integer('fk_soc')->nullable();
			$table->integer('fk_projet')->nullable()->default(0);
			$table->text('note_private', 65535)->nullable();
			$table->text('note_public', 65535)->nullable();
			$table->string('extraparams')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_deplacement');
	}

}
