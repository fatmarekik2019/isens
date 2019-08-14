<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxExpeditiondetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_expeditiondet', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_expedition')->index('idx_expeditiondet_fk_expedition');
			$table->integer('fk_origin_line')->nullable();
			$table->integer('fk_entrepot')->nullable();
			$table->float('qty', 10, 0)->nullable();
			$table->integer('rang')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_expeditiondet');
	}

}
