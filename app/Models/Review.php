<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// https://abridge-co.jp/wp/2023/08/01/%E3%80%90laravel%E3%81%AE%E6%A9%9F%E8%83%BD%E3%81%AB%E3%81%A4%E3%81%84%E3%81%A6%E3%81%BE%E3%81%A8%E3%82%81%E3%81%A6%E3%81%BF%E3%82%88%E3%81%86%E3%80%91%EF%BD%9E%EF%BD%9E%EF%BD%9Emodel%E7%B7%A8/
class Review extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
        'score',
        'content',
        'reviewed_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    protected $casts = [
        'reviewed_at' => 'datetime',
    ];
}
