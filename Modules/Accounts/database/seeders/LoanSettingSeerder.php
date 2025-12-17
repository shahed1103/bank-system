<?php

namespace Modules\Accounts\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Accounts\Entities\LoanAccount;


class LoanSettingSeerder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $settings =
         [   [
                'interest_rate' => 2.5, // مثلاً 12.5%
                'interest_rate_type' => 'fixed', // أو 'variable'
                'late_payment_fees' => 50.00,
                'late_payment_fees' => 2.0, // 2% من مبلغ القرض
                'max_tenure_months' => 1.0, // 1% من المبلغ المتبقي
                'min_loan_amount' => 60, // 5 سنوات
                'max_loan_amount' => 1000.00,

            ]
         ];
        foreach ($settings as $settingData) {
            LoanAccount::Create(
                $settingData
            );
        }

    }
}
