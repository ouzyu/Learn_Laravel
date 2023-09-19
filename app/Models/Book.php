<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
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
