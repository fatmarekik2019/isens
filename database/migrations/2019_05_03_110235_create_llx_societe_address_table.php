<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxSocieteAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_societe_address', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->dateTime('datec')->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('label', 30)->nullable();
			$table->integer('fk_soc')->nullable()->default(0);
			$table->string('name', 60)->nullable();
			$table->string('address')->nullable();
			$table->string('zip', 10)->nullable();
			$table->string('town', 50)->nullable();
			$table->integer('fk_pays')->nullable()->default(0);
			$table->string('phone', 20)->nullable();
			$table->string('fax', 20)->nullable();
			$table->text('note', 65535)->nullable();
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
		Schema::drop('llx_societe_address');
	}

}
