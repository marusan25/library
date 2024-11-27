<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // https://qiita.com/mikomey/items/705834f47dcf4d3cbd1e
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function books()
    {
        // return $this->hasMany(Book::class);
        return $this->hasManyThrough(Book::class, Review::class, 'user_id', 'id', 'id', 'book_id');
    }
}
