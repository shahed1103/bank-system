<?php

namespace Modules\Accounts\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\CustomerService\Models\TicketStatus;

class TicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statues = ['open' , 'in_progress' , 'closed'];

        for($i = 0 ; $i<3 ; $i++){
                TicketStatus::create([
                'status' => $statues[$i]
            ]);
        }
    }
}
