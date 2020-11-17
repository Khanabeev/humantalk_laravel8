<?php


namespace App\Repositories;


use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Mixed_;

class PostRepository implements PostRepositoryInterface
{
    private $ttl;

    public function __construct()
    {
        $this->ttl = '60'; //minutes
    }

    public function all(): Collection
    {
        return Cache::remember('posts', $this->ttl, function () {
            return Post::all();
        });
    }

    public function allPublished(): Collection
    {
        return Cache::remember('posts.published', $this->ttl, function () {
            return Post::where('status', config('constants.post.status.published'))->get();
        });
    }

    public function getByUser(User $user): Post
    {
        return Cache::remember('posts' . $user->id, $this->ttl, function () use ($user) {
            return Post::where('user_id', $user->id)->first();
        });
    }

    public function getOneByMark($mark): Post
    {
        return Cache::remember('post.mark.' . $mark, $this->ttl, function () use ($mark) {

            if (!in_array($mark, array_values(config('constants.post.mark'))))
                $mark = config('constants.post.mark.interesting');

            $mainPost = Post::where('mark', $mark)
                ->where('status', config('constants.post.status.published'))->first();
            if (empty($mainPost)) {
                return Post::all()
                    ->where('status', config('constants.post.status.published'))->random();
            }
            return $mainPost ?? Post::inRandomOrder()->first();
        });
    }

    public function getLatestPosts($limit): Collection
    {
        return Cache::remember('latest_posts.limit.' . $limit, $this->ttl, function () use ($limit) {
            return $this->allPublished()
                ->sortByDesc('created_at')
                ->take($limit);
        });
    }

    public function getLatestPostsInCategories($limit): Collection
    {
        return Cache::remember('latest_posts_by_categories.limit.' . $limit, $this->ttl, function () use ($limit) {
            $latestPostsInEachCategory = [];
            $categories = Category::all();
            foreach ($categories as $category) {
                $item['title'] = $category->name;
                $posts = $category->post()->latest()->limit($limit)->get();
                if ($posts->isEmpty()) {
                    continue;
                }
                $item['posts'] = $posts;
                array_push($latestPostsInEachCategory, $item);
            }
            return collect($latestPostsInEachCategory);
        });
    }

    public function getInteresting($limit): Collection
    {
        return Cache::remember('post.mark.interesting.limit.' . $limit, $this->ttl, function () use ($limit) {
            return $this->allPublished()
                ->where('mark', config('constants.post.mark.interesting'))
                ->random($limit);
        });
    }

    public function getAllPostsWithPagination($postsPerPage = 5)
    {
        return Cache::remember('posts.pagination.' . $postsPerPage, $this->ttl, function () use ($postsPerPage) {
            return Post::where('status', config('constants.post.status.published'))
                ->orderByDesc('created_at')
                ->paginate($postsPerPage);
        });
    }

    public function getMostPopularPosts($limit)
    {
        return Cache::remember('post.popular.limit.' . $limit, $this->ttl, function () use ($limit) {
            return $this->allPublished()
                ->sortByDesc('views')
                ->take($limit);
        });
    }

    public function getBySlug($slug): Post
    {
        return Cache::remember('post.slug.' . $slug, $this->ttl, function () use ($slug) {
            $post = Post::where('slug', $slug)->firstOrFail();
            $post->update(['views' => $post->views + 1]);
            return $post;
        });
    }

    public function getNextPost($post_id)
    {
        return Cache::remember('post.next.' . $post_id, $this->ttl, function () use ($post_id) {
            return Post::where('id', '>', $post_id)->orderBy('id')->first();
        });

    }

    public function getPreviousPost($post_id)
    {
        return Cache::remember('post.previous.' . $post_id, $this->ttl, function () use ($post_id) {
            return Post::where('id', '<', $post_id)->orderByDesc('id')->first();
        });
    }

    public function getRelatedPosts($post)
    {
        $tags = $post->tag->modelKeys();
        return Post::whereHas('tag', function ($q) use ($tags) {
            $q->whereIn('tags.id', $tags);
        })->where('id', '<>', $post->id)->limit(3)->get();
    }
}
