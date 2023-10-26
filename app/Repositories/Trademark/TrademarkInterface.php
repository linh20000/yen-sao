<?php

namespace App\Repositories\Trademark;

use App\Repositories\RepositoryInterface;

interface TrademarkInterface extends RepositoryInterface
{
    public function getPaginate($limit);
}