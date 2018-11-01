<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->string('id', 36)->unique();
			$table->string('email')->unique();
			$table->string('sub');
			$table->boolean('isRegistered');
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->string('nick_name');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}