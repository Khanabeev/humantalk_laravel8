<?php


namespace App\Repositories;


use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class CategoryRepository implements CategoryRepositoryInterface
{

    /**
     * @var string
     */
    private $ttl;

    public function __construct()
    {
        $this->ttl = '120'; //minutes
    }

    public function all(): Collection
    {
        return Cache::remember('categories', $this->ttl, function () {
            return Category::all();
        });

    }
}
