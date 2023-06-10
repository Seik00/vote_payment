<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGameConnectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('game_connect', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('action', 65535)->nullable();
			$table->text('link', 65535)->nullable();
			$table->text('api_data')->nullable();
			$table->timestamps();
			$table->string('ip_address')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('game_connect');
	}

}
