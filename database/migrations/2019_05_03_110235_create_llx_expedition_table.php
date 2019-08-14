<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxExpeditionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_expedition', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('ref', 30);
			$table->integer('entity')->default(1);
			$table->integer('fk_soc')->index('idx_expedition_fk_soc');
			$table->string('ref_ext', 30)->nullable();
			$table->string('ref_int', 30)->nullable();
			$table->string('ref_customer', 30)->nullable();
			$table->dateTime('date_creation')->nullable();
			$table->integer('fk_user_author')->nullable()->index('idx_expedition_fk_user_author');
			$table->dateTime('date_valid')->nullable();
			$table->integer('fk_user_valid')->nullable()->index('idx_expedition_fk_user_valid');
			$table->dateTime('date_expedition')->nullable();
			$table->dateTime('date_delivery')->nullable();
			$table->integer('fk_address')->nullable();
			$table->integer('fk_shipping_method')->nullable()->index('idx_expedition_fk_shipping_method');
			$table->string('tracking_number', 50)->nullable();
			$table->smallInteger('fk_statut')->nullable()->default(0);
			$table->float('height', 10, 0)->nullable();
			$table->integer('height_unit')->nullable();
			$table->float('width', 10, 0)->nullable();
			$table->integer('size_units')->nullable();
			$table->float('size', 10, 0)->nullable();
			$table->integer('weight_units')->nullable();
			$table->float('weight', 10, 0)->nullable();
			$table->text('note_private', 65535)->nullable();
			$table->text('note_public', 65535)->nullable();
			$table->string('model_pdf')->nullable();
			$table->integer('Group_Liv');
			$table->boolean('masked');
			$table->unique(['ref','entity'], 'idx_expedition_uk_ref');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_expedition');
	}

}
