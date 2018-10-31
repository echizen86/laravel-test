<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

	public function up()
	{
		Schema::create('user', function(Blueprint $table) {
			$table->string('id', 36)->unique();
			$table->string('mail_id', 36)->unique()->nullable();
			$table->string('sub');
			$table->boolean('isRegistered');
			$table->string('email');
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->string('nick_name');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('user');
	}
}