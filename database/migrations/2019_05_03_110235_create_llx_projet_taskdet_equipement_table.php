<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxProjetTaskdetEquipementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_projet_taskdet_equipement', function(Blueprint $table)
		{
			$table->integer('fk_equipement')->default(0);
			$table->integer('fk_projet_taskdet')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_projet_taskdet_equipement');
	}

}
