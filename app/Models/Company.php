<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'representative_name',
        'job_title',
        'phone_number',
        'email',
        'ministry_info',
        'required_screens',
        'confidentiality_form',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
