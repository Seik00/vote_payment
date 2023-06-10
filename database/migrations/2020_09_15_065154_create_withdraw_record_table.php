<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWithdrawRecordTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('withdraw_record', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->decimal('amount', 10, 3);
			$table->text('bank_name', 65535)->nullable();
			$table->text('bank_user', 65535)->nullable();
			$table->string('bank_account', 20)->nullable();
			$table->string('branch', 20)->nullable();
			$table->string('swift_code', 20);
			$table->integer('status')->default(0);
			$table->text('remark', 65535);
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
		Schema::drop('withdraw_record');
	}

}
