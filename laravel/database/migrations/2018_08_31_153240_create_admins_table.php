<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminsTable extends Migration {

	public function up()
	{
		Schema::create('admins', function(Blueprint $table) {
			$table->string('id', 36)->unique();
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password');
            $table->boolean('hasAccess')->default(0);
            $table->rememberToken();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('admins');
	}
}