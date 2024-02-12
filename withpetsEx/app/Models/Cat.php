<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'kind_id',
        'user_id',
        'desc',
    ];

    public function kind()
    {
        return $this->belongsTo(Kind::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
