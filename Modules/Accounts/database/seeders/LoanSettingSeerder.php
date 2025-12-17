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
            [
                'interest_rate' => 12.5, // مثلاً 12.5%
                'interestratetype' => 'fixed', // أو 'variable'
                'latepaymentfees' => 50.00,
                'processing_fees' => 2.0, // 2% من مبلغ القرض
                'earlyrepaymentpenalty' => 1.0, // 1% من المبلغ المتبقي
                'maxtenuremonths' => 60, // 5 سنوات
                'minloanamount' => 1000.00,
                'maxloanamount' => 50000.00,
            ];

        foreach ($settings as $settingData) {
            LoanAccount::Create(
                $settingData
            );
        }

    }
}
