<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxDonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_don', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('ref', 30)->nullable();
			$table->integer('entity')->default(1);
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->smallInteger('fk_statut')->default(0);
			$table->dateTime('datec')->nullable();
			$table->dateTime('datedon')->nullable();
			$table->float('amount', 10, 0)->nullable()->default(0);
			$table->integer('fk_paiement')->nullable();
			$table->string('firstname', 50)->nullable();
			$table->string('lastname', 50)->nullable();
			$table->string('societe', 50)->nullable();
			$table->text('address', 65535)->nullable();
			$table->string('zip', 10)->nullable();
			$table->string('town', 50)->nullable();
			$table->string('country', 50)->nullable();
			$table->string('email')->nullable();
			$table->string('phone', 24)->nullable();
			$table->string('phone_mobile', 24)->nullable();
			$table->smallInteger('public')->default(1);
			$table->integer('fk_don_projet')->nullable();
			$table->integer('fk_user_author');
			$table->integer('fk_user_valid')->nullable();
			$table->text('note_private', 65535)->nullable();
			$table->text('note_public', 65535)->nullable();
			$table->string('model_pdf')->nullable();
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
		Schema::drop('llx_don');
	}

}
