<?php

namespace App\Repositories\Product;

use App\Repositories\RepositoryInterface;

interface ProductInterface extends RepositoryInterface
{
    public function getPaginate($limit);
    public function search($data);
    public function getProductsHot();
    public function getWith($name);
    public function filter();
    public function searchAjax($query);
}