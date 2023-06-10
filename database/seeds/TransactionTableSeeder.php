<?php

use Illuminate\Database\Seeder;

class TransactionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transaction')->delete();
        
        \DB::table('transaction')->insert(array (
            0 => 
            array (
                'id' => 9,
                'user_id' => 1,
                'wallet_type' => 1,
                'found_type' => 100,
                'amount' => '1.00',
                'act' => '+',
                'before' => NULL,
                'current' => '+ 1',
                'after' => '1',
                'detail' => 'test',
                'created_at' => '2020-09-14 09:44:29',
            ),
        ));
        
        
    }
}