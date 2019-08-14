<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxHolidayTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_holiday', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->integer('fk_user')->index('idx_holiday_fk_user');
			$table->dateTime('date_create')->index('idx_holiday_date_create');
			$table->string('description');
			$table->date('date_debut')->index('idx_holiday_date_debut');
			$table->date('date_fin')->index('idx_holiday_date_fin');
			$table->integer('halfday')->nullable()->default(0);
			$table->integer('statut')->default(1);
			$table->integer('fk_validator')->index('idx_holiday_fk_validator');
			$table->dateTime('date_valid')->nullable();
			$table->integer('fk_user_valid')->nullable();
			$table->dateTime('date_refuse')->nullable();
			$table->integer('fk_user_refuse')->nullable();
			$table->dateTime('date_cancel')->nullable();
			$table->integer('fk_user_cancel')->nullable();
			$table->string('detail_refuse', 250)->nullable();
			$table->text('note_private', 65535)->nullable();
			$table->text('note_public', 65535)->nullable();
			$table->text('note', 65535)->nullable();
			$table->integer('fk_user_create')->nullable()->index('idx_holiday_fk_user_create');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_holiday');
	}

}
