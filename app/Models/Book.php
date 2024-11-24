<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'isbn',
        'title',
        'author',
        'publisher',
        'amount',
        'thumbnail_path',
        'description'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
