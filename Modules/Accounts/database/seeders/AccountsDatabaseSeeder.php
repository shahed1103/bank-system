<?php

namespace Modules\Accounts\Database\Seeders;

use Illuminate\Database\Seeder;

class AccountsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            AccountStatusSeeder::class,
            AccountTypeSeeder::class,
            CheckingSettingSeeder::class,
            InvestmentSettingSeeder::class,
            LoanSettingSeerder::class,
            SavingsSettingSeeder::class

        ]);
    }
}
