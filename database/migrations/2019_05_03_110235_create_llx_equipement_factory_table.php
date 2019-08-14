<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxEquipementFactoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_equipement_factory', function(Blueprint $table)
		{
			$table->integer('fk_equipement')->default(0);
			$table->integer('fk_factory')->default(0);
			$table->unique(['fk_equipement','fk_factory'], 'uk_factory_equipement');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_equipement_factory');
	}

}
