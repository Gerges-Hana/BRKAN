<?php

namespace Database\Factories;

use App\Models\PurchaseOrder;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseOrderFactory extends Factory
{
    protected $model = PurchaseOrder::class;

    public function definition()
    {
        return [
            'device_unique_key' => $this->faker->unique()->numerify('DK#####'),
            'purchase_order_number' => $this->faker->unique()->numerify('PO#####'),
            'invoice_number' => $this->faker->unique()->numerify('INV#####'),
            'driver_name' => $this->faker->name,
            'rep_name' => $this->faker->name,
            'driver_phone' => $this->faker->phoneNumber,
            'rep_phone' => $this->faker->phoneNumber,
            'arrival_date' => $this->faker->dateTimeBetween('2024-06-01', '2024-12-31')->format('Y-m-d'),
            'status_id' => $this->faker->numberBetween(1, 6),
            'last_update_user_id' => $this->faker->numberBetween(1, 50),
        ];

    }
}
