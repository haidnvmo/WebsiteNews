<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    
    protected $fillable = [
        'email', 'name', 'avatar','password','provider_id','password','provider_name',
    ];
}
