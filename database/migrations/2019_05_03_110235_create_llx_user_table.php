<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_user', function(Blueprint $table)
		{
			$table->integer('rowid');
			$table->integer('entity')->default(1);
			$table->string('ref_ext', 50)->nullable();
			$table->string('ref_int', 50)->nullable();
			$table->dateTime('datec')->nullable();
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('login', 24);
			$table->string('pass', 32)->nullable();
			$table->string('pass_crypted', 128)->nullable();
			$table->string('pass_temp', 32)->nullable();
			$table->string('civilite', 6)->nullable();
			$table->string('lastname', 50)->nullable();
			$table->string('firstname', 50)->nullable();
			$table->string('job', 128)->nullable();
			$table->string('skype')->nullable();
			$table->string('office_phone', 20)->nullable();
			$table->string('office_fax', 20)->nullable();
			$table->string('user_mobile', 20)->nullable();
			$table->string('email')->nullable();
			$table->text('signature', 65535)->nullable();
			$table->smallInteger('admin')->nullable()->default(0);
			$table->string('webcal_login', 25)->nullable();
			$table->string('phenix_login', 25)->nullable();
			$table->string('phenix_pass', 128)->nullable();
			$table->smallInteger('module_comm')->nullable()->default(1);
			$table->smallInteger('module_compta')->nullable()->default(1);
			$table->integer('fk_societe')->nullable();
			$table->integer('fk_socpeople')->nullable();
			$table->integer('fk_member')->nullable();
			$table->text('note', 65535)->nullable();
			$table->dateTime('datelastlogin')->nullable();
			$table->dateTime('datepreviouslogin')->nullable();
			$table->integer('egroupware_id')->nullable();
			$table->string('ldap_sid')->nullable();
			$table->string('openid')->nullable();
			$table->boolean('statut')->nullable()->default(1);
			$table->string('photo')->nullable();
			$table->string('lang', 6)->nullable();
			$table->integer('fk_user')->nullable();
			$table->float('thm', 24, 8)->nullable();
			$table->string('address')->nullable();
			$table->string('zip', 25)->nullable();
			$table->string('town', 50)->nullable();
			$table->integer('fk_state')->nullable()->default(0);
			$table->integer('fk_country')->nullable()->default(0);
			$table->string('color', 6)->nullable();
			$table->string('accountancy_code', 24)->nullable();
			$table->string('barcode')->nullable();
			$table->integer('fk_barcode_type')->nullable()->default(0);
			$table->integer('nb_holiday')->nullable()->default(0);
			$table->float('salary', 24, 8)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_user');
	}

}
