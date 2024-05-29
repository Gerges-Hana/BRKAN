<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchaseOrderStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['id' => 1, 'name' => 'تم الإرسال', 'is_active' => true],
            ['id' => 2, 'name' => 'تم الإلغاء', 'is_active' => true],
            ['id' => 3, 'name' => 'تم الوصول', 'is_active' => true],
            ['id' => 4, 'name' => 'تم الدخول', 'is_active' => true],
            ['id' => 5, 'name' => 'تم التفريغ', 'is_active' => true],
            ['id' => 6, 'name' => 'تم المغادرة', 'is_active' => true],
        ];

        if (DB::table('purchase_order_statuses')->count() == 0) {
            DB::table('purchase_order_statuses')->insert($statuses);
        }
    }
}
