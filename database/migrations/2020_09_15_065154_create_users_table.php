<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('role_id')->unsigned()->nullable()->index('users_role_id_foreign');
			$table->string('name');
			$table->string('email')->unique();
			$table->dateTime('email_verified_at')->nullable();
			$table->string('password');
			$table->string('remember_token', 100)->nullable();
			$table->integer('point')->nullable()->default(0);
			$table->timestamps();
			$table->string('user_login_id');
			$table->string('mobile_no')->nullable();
			$table->boolean('is_active')->default(1);
			$table->string('deactivate_reason')->nullable();
			$table->dateTime('deactivate_at')->nullable();
			$table->boolean('is_notification_allow')->default(1);
			$table->string('device_token')->nullable();
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
