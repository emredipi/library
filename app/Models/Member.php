<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id', 'tc', 'birth_date', 'banned_at'
    ];

    protected $casts = [
        'banned_at' => 'datetime'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function getIsBannedAttribute(): bool
    {
        return !!$this->banned_at;
    }

    public function books()
    {
        //todo bookings
    }
}
