<?php


namespace App\Repositories\Interfaces;


use App\Models\User;

interface PostRepositoryInterface
{
    public function all();
    public function getByUser(User $user);
    public function getByMark($mark);
}
