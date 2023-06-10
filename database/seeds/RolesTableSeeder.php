<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'display_name' => 'Admin',
                'created_at' => '2019-11-14 08:01:38',
                'updated_at' => '2019-11-14 08:01:38',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'company',
                'display_name' => 'Company',
                'created_at' => '2019-11-14 08:01:38',
                'updated_at' => '2019-11-14 08:01:38',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'user',
                'display_name' => 'User',
                'created_at' => '2020-02-12 08:03:20',
                'updated_at' => '2020-02-12 08:03:20',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'staff',
                'display_name' => 'Staff',
                'created_at' => '2020-02-12 08:03:20',
                'updated_at' => '2020-02-12 08:03:20',
            ),
        ));
        
        
    }
}