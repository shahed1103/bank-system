<?php

namespace Modules\Accounts\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Accounts\Entities\RiskLevel;

class RiskLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = ['low' , 'medium' , 'high'];

        for($i = 0 ; $i<3 ; $i++){
                RiskLevel::create([
                'level' => $levels[$i]
            ]);
        }    }
}
