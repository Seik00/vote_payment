<?php

use Illuminate\Database\Seeder;

class UserGameTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_game')->delete();
        
        
        
    }
}