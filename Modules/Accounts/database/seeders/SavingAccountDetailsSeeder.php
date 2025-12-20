<?php

namespace Modules\Accounts\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Accounts\Entities\Account;
use Modules\Accounts\Entities\SavingAccountDetails;
use Modules\Accounts\Entities\SavingsAccount;
use Carbon\Carbon;

class SavingAccountDetailsSeeder extends Seeder
{
    public function run(): void
    {
        $savingSetting = SavingsAccount::first();

        if (!$savingSetting) {
            return;
        }

        $savingAccounts = Account::where('account_type_id', 1)->get();

        foreach ($savingAccounts as $account) {

            if ($account->savingDetails) {
                continue;
            }

            SavingAccountDetails::create([
                'name'                     => 'Savings Account - ' . $account->account_number,
                'account_id'               => $account->id,
                'savings_account_id'       => $savingSetting->id,
                'currentinterestrate'      => rand(2, 5), 
                'monthlywithdrawalsmade'   => rand(0, 3),
                'balance'                  => rand(1000, 10000),
                'created_at'               => Carbon::now()->subMonths(rand(1, 6)),
                'updated_at'               => now(),
            ]);
        }
    }
}
