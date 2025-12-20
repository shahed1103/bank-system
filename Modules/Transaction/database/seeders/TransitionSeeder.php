<?php

namespace Modules\Transaction\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Transaction\Entities\Transition;

class TransitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $account_id = [1,1,2,2];
        $type = ['deposit' , 'withdraw' , 'deposit' , 'withdraw'];
        $amount = [2000 , 300 , 1500 , 200];
        $created_at = ['2025-09-01' , '2025-09-15' , '2025-10-01' , '2025-10-20'];

        for($i = 0 ; $i<4 ; $i++){
                Transition::create([
                'account_id' => $account_id[$i],
                'type' => $type[$i],
                'amount' => $amount[$i],
                'created_at' => $created_at[$i]
            ]);
        }
    }
}
