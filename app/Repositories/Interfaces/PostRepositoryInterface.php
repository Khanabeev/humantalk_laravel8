<?php


namespace App\Repositories\Interfaces;


use App\Models\User;

interface PostRepositoryInterface
{
    public function all();
    public function getByUser(User $user);
    public function getOneByMark($mark);
    public function getLatestPosts($limit);
    public function getLatestPostsInCategories($limit);
    public function getInteresting($limit);
    public function getAllPostsWithPagination($postsPerPage);
    public function getMostPopularPosts($limit);
}
