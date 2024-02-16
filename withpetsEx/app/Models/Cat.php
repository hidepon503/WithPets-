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
        'gender_id',
        'desc',
        'status_id',
    ];

    public function getImageAttribute($value)
    {
        // 'public/'プレフィックスを取り除く
        return str_replace('public/', '', $value);
    }

    public function kind()
    {
        return $this->belongsTo(Kind::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}
