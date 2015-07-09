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
				$table->dropColumn('leader_phone');
				$table->dropColumn('leader_email');
		});

		Schema::table('enterprises', function(Blueprint $table)
		{
				$table->string('city');
				$table->string('postal_code');
				$table->string('leader_phone')->nullable();
				$table->string('leader_email')->nullable();
				$table->string('leader_firstname');
				$table->string('leader_position');
				$table->string('candidate_firstname');
				$table->string('candidate_name');
				$table->string('address_complement')->nullable();
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
