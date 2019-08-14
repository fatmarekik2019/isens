<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxBordereauChequeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_bordereau_cheque', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->dateTime('datec');
			$table->date('date_bordereau')->nullable();
			$table->string('number', 16);
			$table->integer('entity')->default(1);
			$table->float('amount', 24, 8);
			$table->smallInteger('nbcheque');
			$table->integer('fk_bank_account')->nullable();
			$table->integer('fk_user_author')->nullable();
			$table->text('note', 65535)->nullable();
			$table->smallInteger('statut')->default(0);
			$table->string('ref_ext')->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->unique(['number','entity'], 'uk_bordereau_cheque');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_bordereau_cheque');
	}

}
