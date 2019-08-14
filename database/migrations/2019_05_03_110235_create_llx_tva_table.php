<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxTvaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_tva', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->date('datep')->nullable();
			$table->date('datev')->nullable();
			$table->float('amount', 10, 0)->default(0);
			$table->string('label')->nullable();
			$table->integer('entity')->default(1);
			$table->text('note', 65535)->nullable();
			$table->integer('fk_bank')->nullable();
			$table->integer('fk_user_creat')->nullable();
			$table->integer('fk_user_modif')->nullable();
			$table->integer('fk_typepayment')->nullable();
			$table->string('num_payment', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_tva');
	}

}
