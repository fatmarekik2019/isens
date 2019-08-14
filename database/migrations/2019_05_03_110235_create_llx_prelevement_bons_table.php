<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxPrelevementBonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_prelevement_bons', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('ref', 12)->nullable();
			$table->integer('entity')->default(1);
			$table->dateTime('datec')->nullable();
			$table->float('amount', 10, 0)->nullable()->default(0);
			$table->smallInteger('statut')->nullable()->default(0);
			$table->smallInteger('credite')->nullable()->default(0);
			$table->text('note', 65535)->nullable();
			$table->dateTime('date_trans')->nullable();
			$table->smallInteger('method_trans')->nullable();
			$table->integer('fk_user_trans')->nullable();
			$table->dateTime('date_credit')->nullable();
			$table->integer('fk_user_credit')->nullable();
			$table->unique(['ref','entity'], 'uk_prelevement_bons_ref');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_prelevement_bons');
	}

}
