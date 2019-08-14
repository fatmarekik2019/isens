<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxBookkeepingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_bookkeeping', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->date('doc_date');
			$table->string('doc_type', 30);
			$table->string('doc_ref', 30);
			$table->integer('fk_doc');
			$table->integer('fk_docdet');
			$table->string('code_tiers', 24)->nullable();
			$table->string('numero_compte', 50)->nullable();
			$table->string('label_compte', 128);
			$table->float('debit', 10, 0);
			$table->float('credit', 10, 0);
			$table->float('montant', 10, 0);
			$table->string('sens', 1)->nullable();
			$table->integer('fk_user_author');
			$table->string('import_key', 14)->nullable();
			$table->string('code_journal', 10)->nullable();
			$table->integer('piece_num');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_bookkeeping');
	}

}
