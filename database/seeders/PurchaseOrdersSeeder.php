<?php

namespace Database\Seeders;

use App\Models\PurchaseOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseOrdersSeeder extends Seeder
{
    public function run()
    {
        PurchaseOrder::factory()->count(5)->create();
    }
}
