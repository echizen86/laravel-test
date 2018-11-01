<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessagesTable extends Migration {

	public function up()
	{
		Schema::create('messages', function(Blueprint $table) {
			$table->string('id', 36)->unique();
			$table->string('to');
			$table->string('from');
			$table->string('text');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('messages');
	}
}