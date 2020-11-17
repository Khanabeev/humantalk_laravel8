<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function post()
    {
        return $this->belongsToMany(Post::class, 'category_post');
    }

    public function updateQuantity()
    {
        return $this->update(['quantity' => $this->post->count()]);
    }
}
