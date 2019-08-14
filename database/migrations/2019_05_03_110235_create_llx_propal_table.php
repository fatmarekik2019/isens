<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxPropalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_propal', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->string('ref', 30);
			$table->integer('entity')->default(1);
			$table->string('ref_ext')->nullable();
			$table->string('ref_int')->nullable();
			$table->string('ref_client')->nullable();
			$table->integer('fk_soc')->nullable();
			$table->integer('fk_projet')->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('datec')->nullable();
			$table->date('datep')->nullable();
			$table->dateTime('fin_validite')->nullable();
			$table->dateTime('date_valid')->nullable();
			$table->dateTime('date_cloture')->nullable();
			$table->integer('fk_user_author')->nullable();
			$table->integer('fk_user_valid')->nullable();
			$table->integer('fk_user_cloture')->nullable();
			$table->smallInteger('fk_statut')->default(0);
			$table->float('price', 10, 0)->nullable()->default(0);
			$table->float('remise_percent', 10, 0)->nullable()->default(0);
			$table->float('remise_absolue', 10, 0)->nullable()->default(0);
			$table->float('remise', 10, 0)->nullable()->default(0);
			$table->float('total_ht', 24, 8)->nullable()->default(0.00000000);
			$table->float('tva', 24, 8)->nullable()->default(0.00000000);
			$table->float('localtax1', 24, 8)->nullable()->default(0.00000000);
			$table->float('localtax2', 24, 8)->nullable()->default(0.00000000);
			$table->float('total', 24, 8)->nullable()->default(0.00000000);
			$table->integer('fk_account')->nullable();
			$table->string('fk_currency', 3)->nullable();
			$table->integer('fk_cond_reglement')->nullable();
			$table->integer('fk_mode_reglement')->nullable();
			$table->text('note_private', 65535)->nullable();
			$table->text('note_public', 65535)->nullable();
			$table->string('model_pdf')->nullable();
			$table->date('date_livraison')->nullable();
			$table->integer('fk_availability')->nullable();
			$table->integer('fk_input_reason')->nullable();
			$table->string('import_key', 14)->nullable();
			$table->string('extraparams')->nullable();
			$table->integer('fk_delivery_address')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_propal');
	}

}
