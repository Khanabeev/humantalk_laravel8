<?php


namespace App\Repositories;


use App\Models\Post;
use App\Models\User;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Support\Facades\Config;

class PostRepository implements PostRepositoryInterface
{

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function getByUser(User $user)
    {
        // TODO: Implement getByUser() method.
    }

    public function getByMark($mark)
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
