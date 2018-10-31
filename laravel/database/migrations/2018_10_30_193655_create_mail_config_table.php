<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMailConfigTable extends Migration {

	public function up()
	{
		Schema::create('mail_config', function(Blueprint $table) {
			$table->string('id', 36)->unique();
			$table->string('user_id', 36)->unique()->nullable();
			$table->string('mail_driver');
			$table->string('mail_host');
			$table->integer('mail_port');
			$table->string('mail_username');
			$table->string('mail_password');
			$table->string('mail_encryption');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('mail_config');
	}
}