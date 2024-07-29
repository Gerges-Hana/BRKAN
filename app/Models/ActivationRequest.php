<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivationRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','is_active'
    ];

    // تعريف العلاقة مع نموذج User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
