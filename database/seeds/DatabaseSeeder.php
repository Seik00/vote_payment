<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
        $this->call(DepositRecordTableSeeder::class);
        $this->call(EventListTableSeeder::class);
        $this->call(GameConnectTableSeeder::class);
        $this->call(GameListTableSeeder::class);
        $this->call(IssuePointRecordTableSeeder::class);
        $this->call(MigrationsTableSeeder::class);
        $this->call(OtpsTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(TransactionTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UserBankInfoTableSeeder::class);
        $this->call(UserGameTableSeeder::class);
        $this->call(WithdrawalLimitTableSeeder::class);
        $this->call(WithdrawRecordTableSeeder::class);
    }
}
