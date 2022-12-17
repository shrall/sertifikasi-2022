<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
    ];


    public function histories()
    {
        return $this->hasMany(History::class, 'book_id', 'id');
    }
}
