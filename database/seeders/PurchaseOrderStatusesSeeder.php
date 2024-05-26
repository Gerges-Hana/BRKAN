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
            ['name' => 'تم الإرسال', 'is_active' => true],
            ['name' => 'تم الإلغاء', 'is_active' => true],
            ['name' => 'وصل', 'is_active' => true],
            ['name' => 'تم التفريغ', 'is_active' => true],
            ['name' => 'غادر', 'is_active' => true],
        ];

        if (DB::table('purchase_order_statuses')->count() == 0) {
            DB::table('purchase_order_statuses')->insert($statuses);
        }
    }
}
