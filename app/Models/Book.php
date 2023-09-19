<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['isbn', 'title', 'price', 'publisher', 'published'];
    
    public static $rules = [
        'isbn'      => 'required',
        'title'     => 'required|string|max:10',
        'price'     => 'integer|min:0',
        'publisher' => 'required|in:走跳社, テックCode, ジャパンIT, 優丸システム, IT Emotion',
        'published' => 'required|date'
    ];

    use HasFactory;

    public function scopePublished($query, $name)
    {
        $query->where('publisher', $name);
    }

    public function reviews()
    {
        return $this->hasMany((Review::class));
    }
}
