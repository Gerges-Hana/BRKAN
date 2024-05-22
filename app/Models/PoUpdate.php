<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoUpdate extends Model
{
    use HasFactory;

    protected $table = 'po_updates';
    protected $guarded = ['id'];
}
