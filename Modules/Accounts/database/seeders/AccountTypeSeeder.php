<?php

namespace Modules\Accounts\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Accounts\Entities\AccountType;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statues = ['savings' , 'checking' , 'loan' , 'investment'];

        for($i = 0 ; $i<4 ; $i++){
                AccountType::create([
                'name' => $statues[$i]
            ]);
        }
    }
}
