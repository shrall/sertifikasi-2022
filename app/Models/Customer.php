<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
    ];

    public function user(){
        return $this->morphOne('App\Models\User', 'info');
    }
}
