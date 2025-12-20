<?php

namespace Modules\CustomerService\Database\Seeders;

use Illuminate\Database\Seeder;

class CustomerServiceDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([TicketStatusSeeder::class]);
    }
}
