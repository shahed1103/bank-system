<?php

namespace Modules\Accounts\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Accounts\Entities\AccountType;
use Modules\Accounts\Entities\CheckingAccount;

class CheckingSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
        'minimum_balance' => 100.00,
        'overdraft_limit' => 500.00,
        'overdraft_fees' => 35.00,
        'monthlyfees' => 10.00,
        'year_version' => 2025
            ]
            ];

        foreach ($settings as $settingData) {
            CheckingAccount::Create(
                $settingData
            );
        }
    }
}
