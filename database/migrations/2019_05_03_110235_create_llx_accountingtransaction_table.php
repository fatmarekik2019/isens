<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxAccountingtransactionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_accountingtransaction', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('label', 128);
			$table->date('datec');
			$table->string('fk_author', 20);
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('fk_source');
			$table->string('sourcetype', 16);
			$table->string('url')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_accountingtransaction');
	}

}
