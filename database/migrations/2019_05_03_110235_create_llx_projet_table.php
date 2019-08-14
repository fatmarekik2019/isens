<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxProjetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_projet', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->integer('fk_soc')->nullable();
			$table->date('datec')->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->date('dateo')->nullable();
			$table->date('datee')->nullable();
			$table->string('ref', 50)->nullable();
			$table->integer('entity')->default(1);
			$table->string('title');
			$table->text('description', 65535)->nullable();
			$table->integer('fk_user_creat');
			$table->integer('public')->nullable();
			$table->smallInteger('fk_statut')->default(0);
			$table->text('note_private', 65535)->nullable();
			$table->text('note_public', 65535)->nullable();
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
		Schema::drop('llx_projet');
	}

}
