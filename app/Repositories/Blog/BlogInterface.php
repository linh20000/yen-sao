<?php

namespace App\Repositories\Blog;

use App\Repositories\RepositoryInterface;

interface BlogInterface extends RepositoryInterface
{
    public function getPaginate($limit);
    public function getRandom($limit);
    public function getNewBlog($limit);
}