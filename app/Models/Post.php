<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Post extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsToMany(Category::class, 'category_post');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function getPostByMark($mark): self
    {
        if (!in_array($mark, \config('constants.post.mark')))
            $mark = \config('constants.post.mark.interesting');

        $mainPost = Post::where('mark', Config::get('constants.post.mark.' . $mark))
            ->where('status', Config::get('constants.post.status.published'))->first();
        if (empty($mainPost)) {
            return Post::all()
                ->where('status', Config::get('constants.post.status.published'))->random();
        }
        return $mainPost ?? Post::inRandomOrder()->first();
    }
}
