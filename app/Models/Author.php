<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname'];
    public $timestamps = false;

    public function getFullNameAttribute()
    {
        return $this->name.' '.$this->surname;
    }

    public function books()
    {
        //todo books of author
    }
}
