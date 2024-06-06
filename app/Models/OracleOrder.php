<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OracleOrder extends Model
{
    use HasFactory;

    protected $table = 'oracle_orders';

    protected $guarded = ['id'];

}
