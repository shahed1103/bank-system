<?php

namespace Modules\Accounts\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Accounts\Entities\Account;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AccountSeeder extends Seeder
{
    public function run(): void
    {

            $rootAccount = Account::create([
                'user_id'            => 2,
                'account_number'     => $this->generateAccountNumber(),
                'account_name'       => 'Main Account',
                'opened_at'          => Carbon::now()->subYear(),
                'account_type_id'    => 2, 
                'account_status_id'  => 1, 
                'parent_account_id'  => null,
            ]);

            Account::create([
                'user_id'            => 2,
                'account_number'     => $this->generateAccountNumber(),
                'account_name'       => 'Savings Account',
                'opened_at'          => Carbon::now()->subMonths(6),
                'account_type_id'    => 1, 
                'account_status_id'  => 1, 
                'parent_account_id'  => $rootAccount->id,
            ]);

            Account::create([
                'user_id'            => 2,
                'account_number'     => $this->generateAccountNumber(),
                'account_name'       => 'Secondary Checking',
                'opened_at'          => Carbon::now()->subMonths(3),
                'account_type_id'    => 2, 
                'account_status_id'  => 1, 
                'parent_account_id'  => $rootAccount->id,
            ]);
    }
    private function generateAccountNumber(): string
    {
        return 'ACC-' . strtoupper(Str::random(10));
    }
}
