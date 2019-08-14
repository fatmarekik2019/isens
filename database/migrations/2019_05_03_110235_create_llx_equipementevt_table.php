<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxEquipementevtTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_equipementevt', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_equipement')->nullable()->index('idx_equipementevt_fk_equipement');
			$table->integer('fk_equipementevt_type');
			$table->dateTime('datec')->nullable();
			$table->text('description', 65535)->nullable();
			$table->integer('fk_user_author')->nullable();
			$table->dateTime('datee')->nullable();
			$table->dateTime('dateo')->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->smallInteger('fulldayevent')->nullable();
			$table->float('total_ht', 24, 8)->nullable();
			$table->integer('fk_fichinter')->nullable();
			$table->integer('fk_contrat')->nullable();
			$table->integer('fk_expedition')->nullable();
			$table->integer('fk_project')->nullable();
			$table->string('import_key', 14)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_equipementevt');
	}

}
