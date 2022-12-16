<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'position_id',
    ];

    public function user()
    {
        return $this->morphOne('App\Models\User', 'detailable');
    }
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }
}
