<?php

namespace App\Imports;

use App\Models\PurchaseOrder;
use Maatwebsite\Excel\Concerns\ToModel;

class PurchaseOrderImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PurchaseOrder([
            //
        ]);
    }
}
