<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			//all
			$table->increments('id');
			$table->string('username');
			$table->string('email');
			$table->string('password');
			//jury
			$table->string('society')->nullable();
			$table->string('firstname')->nullable();
			$table->string('lastname')->nullable();
			$table->integer('phone')->nullable();
			$table->string('city')->nullable();
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
