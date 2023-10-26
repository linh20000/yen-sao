<?php

namespace App\Repositories\Banner;

use App\Repositories\RepositoryInterface;

interface BannerInterface extends RepositoryInterface
{
    public function getPaginate($limit);
    public function getSort($sort);
}