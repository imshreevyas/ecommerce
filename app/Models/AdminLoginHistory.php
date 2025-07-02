<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminLoginHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'ip_address',
        'user_agent',
        'login_at',
        'logout_at',
        'status',
        'created_at',
        'updated_at',
    ];
}
