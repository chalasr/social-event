<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEnterprisesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('enterprises', function(Blueprint $table)
		{
			$table->dropColumn('leaders_informations');
			$table->string('leader_name');
			$table->string('leader_position');
			$table->string('leader_phone');
			$table->string('leader_email');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('enterprises', function(Blueprint $table)
		{
			//
		});
	}

}
