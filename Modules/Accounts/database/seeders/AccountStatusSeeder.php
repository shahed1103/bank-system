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
        $statues = ['active' , 'frozen' , 'suspended' , 'closed' , 'non active'];

        for($i = 0 ; $i<5 ; $i++){
                AccountStatus::create([
                'name' => $statues[$i]
            ]);
        }
    }
}
