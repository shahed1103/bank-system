<?php

namespace Modules\Accounts\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Accounts\Entities\InvestmentAccount;

class InvestmentSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
          [
                'expected_returns' => 8.5, // مثلاً 8.5%
                'minimum_investment' => 1000.00,
                'management_fees_percentage' => 1.5, // 1.5% رسوم إدارة
            ]
            ];

        foreach ($settings as $settingData) {
            InvestmentAccount::Create(
                $settingData
            );
        }

    }
}
