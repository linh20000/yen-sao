<?php

namespace App\Repositories\Order;

use App\Repositories\RepositoryInterface;

interface OrderInterface extends RepositoryInterface
{
    public function getPaginate($limit);
    public function getPaginateSuccess($limit);
    public function getOrderList($id);
}