<?php

namespace App\Providers;

use App\Models\Tag;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $postRepository = new PostRepository();
        $categoryRepository = new CategoryRepository();
        $tagRepository = new TagRepository();
        // Даем доступ во всех шаблонах
        View::share('popular5Posts', $postRepository->getMostPopularPosts(5));
        View::share('allCategories', $categoryRepository->all());
        View::share('allTags', $tagRepository->all());
    }
}
