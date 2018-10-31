<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessageUserTable extends Migration {

	public function up()
	{
		Schema::create('message_user', function(Blueprint $table) {
			$table->string('id', 36)->unique();
			$table->string('message_id', 36)->unique()->nullable();
			$table->string('user_id', 36)->unique()->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('message_user');
	}
}