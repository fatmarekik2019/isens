<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxFactoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_factory', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('ref', 30);
			$table->integer('fk_product')->default(0);
			$table->integer('fk_entrepot');
			$table->text('description', 65535)->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('date_start_planned')->nullable();
			$table->dateTime('date_start_made')->nullable();
			$table->dateTime('date_end_planned')->nullable();
			$table->dateTime('date_end_made')->nullable();
			$table->float('duration_planned', 10, 0)->nullable();
			$table->float('duration_made', 10, 0)->nullable();
			$table->float('qty_planned', 10, 0)->nullable();
			$table->float('qty_made', 10, 0)->nullable();
			$table->text('note_public', 65535)->nullable();
			$table->text('note_private', 65535)->nullable();
			$table->integer('fk_user_author')->nullable();
			$table->integer('fk_user_valid')->nullable();
			$table->integer('fk_user_close')->nullable();
			$table->string('model_pdf')->nullable();
			$table->smallInteger('fk_statut')->nullable()->default(0);
			$table->integer('entity')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_factory');
	}

}
