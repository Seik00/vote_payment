<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOtpsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('otps', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('otp_account');
			$table->string('otp_code')->nullable();
			$table->string('otp_type');
			$table->string('reference_id')->nullable();
			$table->string('otp_attribute01')->nullable();
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
		Schema::drop('otps');
	}

}
