<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoStatus extends Model
{
    use HasFactory;

    protected $table = 'po_statuses';
    protected $guarded = ['id'];
}
