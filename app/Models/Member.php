<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id', 'tc', 'birth_date', 'banned_at'
    ];

    protected $casts = [
        'birth_date' => 'date',
        'banned_at' => 'datetime'
    ];

    public function user()
    {
        $this->hasOne(User::class);
    }

    public function books()
    {
        //todo bookings
    }
}
