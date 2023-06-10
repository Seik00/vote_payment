<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_role_id' => 1,
                'role_type' => 1,
                'permission_name' => 'Super Admin',
                'permission' => '1,10',
                'created_at' => '2020-02-25 17:23:11',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'user_role_id' => 2,
                'role_type' => 2,
                'permission_name' => 'Company master Admin',
                'permission' => '1,10',
                'created_at' => '2020-02-25 17:23:11',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}