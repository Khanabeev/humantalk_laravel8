<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{

    /**
     * @var PostRepository
     */
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        return view('index', [
            'mainPost' => $this->postRepository->getOneByMark(config('constants.post.mark.main')),
            'secondaryPost1' => $this->postRepository->getOneByMark(config('constants.post.mark.secondary-1')),
            'secondaryPost2' => $this->postRepository->getOneByMark(config('constants.post.mark.secondary-2')),
            'last4Posts' => $this->postRepository->getLatestPosts(4),
            'last3PostsInEachCategory' => $this->postRepository->getLatestPostsInCategories(3),
            'allPosts' => $this->postRepository->getAllPostsWithPagination(5),
            'choose3Post' => $this->postRepository->getInteresting(3)
        ]);
    }

    public function post($slug)
    {
        $post = $this->postRepository->getBySlug($slug);

        return view('pages.blog_post', [
            'post'=> $post,
            'previousPost' => $this->postRepository->getPreviousPost($post->id),
            'nextPost' => $this->postRepository->getNextPost($post->id),
            'relatedPosts' => $this->postRepository->getRelatedPosts($post)
        ]);
    }

}
