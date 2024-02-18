<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'age',
        'status_id',
        'kind_id',
        'gender_id',
        'desc',
        'image',
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
