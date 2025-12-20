<?php

namespace Modules\Transaction\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Transaction\Entities\Transfer;
use Modules\Accounts\Entities\Account;
use Carbon\Carbon;

class TransferSeeder extends Seeder
{
    public function run(): void
    {
        $senderAccount = Account::first();

        $receiverAccount = Account::where('id', '!=', $senderAccount->id)->first();

        if (!$senderAccount || !$receiverAccount) {
            return;
        }

        for ($i = 0; $i < 6; $i++) {
            Transfer::create([
                'send_account_id'   => $senderAccount->id,
                'recive_account_id' => $receiverAccount->id,
                'amount'            => rand(600, 1000), // متوسط عالي
                'approv'            => true,
                'created_at'        => Carbon::now()->subDays(rand(1, 25)),
                'updated_at'        => Carbon::now(),
            ]);
        }
    }
}
