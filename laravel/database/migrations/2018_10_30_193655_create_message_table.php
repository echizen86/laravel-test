<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessageTable extends Migration {

	public function up()
	{
		Schema::create('message', function(Blueprint $table) {
			$table->string('id', 36)->unique();
			$table->string('user_id', 36)->unique()->nullable();
			$table->string('to');
			$table->string('from');
			$table->string('text');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('message');
	}
}