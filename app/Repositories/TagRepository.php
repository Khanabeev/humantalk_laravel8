<?php


namespace App\Repositories;


use App\Models\Tag;
use App\Repositories\Interfaces\TagRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class TagRepository implements TagRepositoryInterface
{
    /**
     * @var string
     */
    private $ttl;

    public function __construct()
    {
        $this->ttl = '60'; //minutes
    }

    public function all(): Collection
    {
        return Cache::remember('categories', $this->ttl, function () {
            return Tag::all();
        });
    }
}
