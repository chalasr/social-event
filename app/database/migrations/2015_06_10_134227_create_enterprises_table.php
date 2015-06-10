<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnterprisesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('enterprises', function(Blueprint $table)
		{
			$table->string('name');
			$table->string('legal_status');
			$table->string('juridical_status');
			$table->string('creation_date');
			$table->string('member_of_group')->nullable();
			$table->text('postal_address');
			$table->string('phone');
			$table->string('telecopie')->nullable();
			$table->string('website')->nullable();
			$table->text('leaders_informations');
			$table->text('candidate_informations');
			$table->string('candidate_phone');
			$table->string('candidate_email');
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
