<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoStatusUpdate extends Model
{
    use HasFactory;

    protected $table = 'po_status_updates';
    protected $guarded = ['id'];
}
