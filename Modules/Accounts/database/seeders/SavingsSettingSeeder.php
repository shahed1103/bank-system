<?php

namespace Modules\Accounts\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Accounts\Entities\SavingAccount;


class SavingsSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
        $settings =
            [
                'interest_rate' => 2.5, // مثلاً 2.5% سنوياً
                'minimumbalancefor_interest' => 100.00, // الحد الأدنى للرصيد للحصول على الفائدة
                'freewithdrawlimitpermonth' => 4, // 4 عمليات سحب مجانية شهرياً
                'withdrawfeeafter_limit' => 5.00, // رسوم 5 وحدات عملة بعد تجاوز الحد
            ];

        foreach ($settings as $settingData) {
            SavingAccount::Create(
                $settingData
            );
        }

    }
}
