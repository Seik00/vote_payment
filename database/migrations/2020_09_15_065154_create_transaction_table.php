<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransactionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transaction', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('wallet_type');
			$table->integer('found_type')->default(0);
			$table->decimal('amount', 12);
			$table->string('act', 3);
			$table->text('before', 65535)->nullable();
			$table->text('current', 65535)->nullable();
			$table->text('after', 65535)->nullable();
			$table->text('detail', 65535)->nullable();
			$table->dateTime('created_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transaction');
	}

}
