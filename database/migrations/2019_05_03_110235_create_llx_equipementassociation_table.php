<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxEquipementassociationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_equipementassociation', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_product')->nullable()->default(0);
			$table->integer('fk_equipement_pere')->nullable()->index('idx_equipementassociation_fk_equipement_pere');
			$table->integer('fk_equipement_fils')->nullable()->index('idx_equipementassociation_fk_equipement_fils');
			$table->integer('position')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_equipementassociation');
	}

}
