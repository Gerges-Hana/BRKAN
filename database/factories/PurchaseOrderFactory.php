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
            'purchase_order_number' => $this->faker->unique()->numerify('PO#####'),
            'invoice_number' => $this->faker->unique()->numerify('INV#####'),
            'driver_name' => $this->faker->name,
            'rep_name' => $this->faker->name,
            'driver_phone' => $this->faker->phoneNumber,
            'rep_phone' => $this->faker->phoneNumber,
            'arrival_date' => $this->faker->date,
            'arrived_at' => Carbon::now(),
            'entered_at' => Carbon::now(),
            'unloaded_at' => Carbon::now(),
            'left_at' => Carbon::now(),
            'status_id' => $this->faker->numberBetween(1, 6), 
            'last_update_user_id' => $this->faker->numberBetween(1, 50),
        ];
        
    }
}
