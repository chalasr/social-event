<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToEnterprises extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('enterprises', function(Blueprint $table)
		{
			$table->text('project_arguments')->nullable();
			$table->text('project_results')->nullable();
			$table->text('project_partners')->nullable();
			$table->text('project_rewards')->nullable();
			$table->integer('activity_id')->nullable();
		  $table->integer('internal_collaborators')->nullable();
		  $table->text('external_collaborators_type')->nullable();
			$table->text('project_certificates')->nullable();
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
