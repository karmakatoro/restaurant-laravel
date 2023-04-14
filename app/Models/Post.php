<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
       return $this->belongsTo(Category::class);
    }
    public function getTitleAttribute($attribute)
    {
        return Str::title($attribute);
    }
}
