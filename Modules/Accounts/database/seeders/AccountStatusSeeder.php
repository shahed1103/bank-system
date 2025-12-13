<?php

namespace Modules\Accounts\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Accounts\Entities\AccountStatus;

class AccountStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statues = ['active' , 'frozen' , 'suspended' , 'closed'];

        for($i = 0 ; $i<4 ; $i++){
                AccountStatus::create([
                'name' => $statues[$i]
            ]);
        }
    }
}
