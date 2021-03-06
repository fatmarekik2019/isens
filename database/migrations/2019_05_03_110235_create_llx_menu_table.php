<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLlxMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('llx_menu', function(Blueprint $table)
		{
			$table->integer('rowid')->primary();
			$table->string('menu_handler', 16);
			$table->integer('entity')->default(1);
			$table->string('module', 64)->nullable();
			$table->string('type', 4);
			$table->string('mainmenu', 100);
			$table->string('leftmenu', 100)->nullable();
			$table->integer('fk_menu');
			$table->string('fk_mainmenu', 24)->nullable();
			$table->string('fk_leftmenu', 24)->nullable();
			$table->integer('position');
			$table->string('url');
			$table->string('target', 100)->nullable();
			$table->string('titre');
			$table->string('langs', 100)->nullable();
			$table->smallInteger('level')->nullable();
			$table->string('perms')->nullable();
			$table->string('enabled')->nullable()->default('1');
			$table->integer('usertype')->default(0);
			$table->timestamp('tms')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->index(['menu_handler','type'], 'idx_menu_menuhandler_type');
			$table->unique(['menu_handler','fk_menu','position','url','entity'], 'idx_menu_uk_menu');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('llx_menu');
	}

}
