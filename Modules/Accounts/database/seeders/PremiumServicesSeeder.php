<?php

namespace Modules\Accounts\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PremiumServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
             $services = [
            [
                'name' => 'الباقة الذهبية',
                'cost' => 99.99,
                'description' => 'وصول كامل لجميع المميزات مع دعم فني مباشر.'
            ],
            [
                'name' => 'الباقة الفضية',
                'cost' => 49.99,
                'description' => 'وصول للمميزات الأساسية وتقارير شهرية.'
            ],
            [
                'name' => 'باقة المبتدئين',
                'cost' => 19.99,
                'description' => 'تجربة الخدمات الأساسية لمدة محدودة.'
            ],
        ];

        foreach ($services as $service) {
            PremiumServices::create($service);
        }
    }
}
 
