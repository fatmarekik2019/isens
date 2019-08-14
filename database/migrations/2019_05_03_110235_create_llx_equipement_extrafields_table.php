<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxEquipementExtrafieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_equipement_extrafields', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('fk_object')->index('idx_equipement_extrafields');
			$table->string('import_key', 14)->nullable();
			$table->string('POMPE')->unique('uk_equipement_extrafields_POMPE');
			$table->text('COULEUR', 65535);
			$table->text('TYPE', 65535);
			$table->text('FRIM_VERS', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_equipement_extrafields');
	}

}
