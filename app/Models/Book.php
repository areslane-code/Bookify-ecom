<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "image",
        "title",
        "author",
        "price",
        "quantity",
        "description",
    ];

    public $timestamps = false;

    public function getImageUrlAttribute(): string
    {
        return $this->image ? Storage::url($this->image) : '';
    }

    public function user()
    {
        return $this->belongsTo(User::class)->whereIn('role', [1, 2]);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
