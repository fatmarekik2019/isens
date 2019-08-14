<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxLocaltaxTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_localtax', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('entity')->default(1);
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->date('datep')->nullable();
			$table->date('datev')->nullable();
			$table->float('amount', 10, 0)->nullable();
			$table->string('label')->nullable();
			$table->text('note', 65535)->nullable();
			$table->integer('fk_bank')->nullable();
			$table->integer('fk_user_creat')->nullable();
			$table->integer('fk_user_modif')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_localtax');
	}

}
