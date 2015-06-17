<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('surveys', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('enterprise_activity');
			$table->text('project_origin');
			$table->text('innovative_arguments');
			$table->text('wanted_impact');
			$table->text('product_informations');
			$table->text('project_results');
			$table->text('project_partners');
			$table->text('project_rewards');
			$table->integer('enterprise_id')->unsigned();
			$table->foreign('enterprise_id')->references('id')->on('enterprises');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('surveys');
	}

}
