<?php

namespace Modules\Accounts\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InsuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $insurances = [
            [
                'name' => 'تأمين طبي شامل',
                'cost' => 150.00,
                'insurance_code' => 'MED-100-XYZ'
            ],
            [
                'name' => 'تأمين مركبات ضد الغير',
                'cost' => 80.50,
                'insurance_code' => 'CAR-200-ABC'
            ],
            [
                'name' => 'تأمين حماية السفر',
                'cost' => 30.00,
                'insurance_code' => 'TRA-300-LMN'
            ],
        ];

        foreach ($insurances as $insurance) {
            Insurance::create($insurance);
        }
    }
}
