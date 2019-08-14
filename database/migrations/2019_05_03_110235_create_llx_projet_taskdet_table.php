<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxProjetTaskdetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_projet_taskdet', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->integer('fk_task')->default(0);
			$table->integer('fk_product')->default(0);
			$table->float('qty_planned', 10, 0)->nullable();
			$table->float('qty_used', 10, 0)->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->float('pmp', 24, 8)->nullable()->default(0.00000000);
			$table->float('price', 24, 8)->nullable()->default(0.00000000);
			$table->integer('fk_statut')->default(0);
			$table->text('note_public', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_projet_taskdet');
	}

}
