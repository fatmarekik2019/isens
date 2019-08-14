<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxPrelevementRejetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_prelevement_rejet', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_prelevement_lignes')->nullable();
			$table->dateTime('date_rejet')->nullable();
			$table->integer('motif')->nullable();
			$table->dateTime('date_creation')->nullable();
			$table->integer('fk_user_creation')->nullable();
			$table->text('note', 65535)->nullable();
			$table->boolean('afacturer')->nullable()->default(0);
			$table->integer('fk_facture')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_prelevement_rejet');
	}

}
