<?php

namespace App\Repositories\Category;

use App\Repositories\RepositoryInterface;

interface CategoryInterface extends RepositoryInterface
{
    public function getCategoryId();
    public function getPaginate($limit);
    public function search($data);

}