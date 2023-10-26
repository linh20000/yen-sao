<?php

namespace App\Repositories\Product;

use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository implements ProductInterface
{
    public function getModel()
    {
        return \App\Models\Products::class;
    }

    public function getPaginate($limit)
    {
        return $this->model->paginate($limit);
    }
    public function search($request)
    {
        return $this->model->where('name', 'LIKE', '%' . $request->search . '%')
        ->orWhere('code', 'LIKE', '%'. $request->search .'%')
        ->orWhere('salePrice', 'LIKE', '%' . $request->search . '%')
        ->orWhere('seo_title', 'LIKE', '%' . $request->search . '%')
        ->orWhere('seo_keyword', 'LIKE', '%' . $request->search . '%')
        ->orWhere('seo_description', 'LIKE', '%' . $request->search . '%')
        ->paginate(12);
    }
    public function getProductsHot()
    {
        return $this->model->orderBy('created_at', 'ASC')->where('percent_discount', '>', 20)->paginate(8);
    }
    public function getWith($name)
    {
        return $this->model->where('category_id', 'LIKE', '%' . $name . '%');
    }

    public function filter()
    {
        return $this->model->where('status','=', 1);
    }
    public function searchAjax($query)
    {
        return $this->model->where('name', 'LIKE', '%' . $query->query('query') . '%')
        ->orWhere('code', 'LIKE', '%' . $query->query('query') . '%')
        ->orWhere('salePrice', 'LIKE', '%' . $query->query('query') . '%')
        ->orWhere('seo_title', 'LIKE', '%' . $query->query('query') . '%')
        ->orWhere('seo_keyword', 'LIKE', '%' . $query->query('query') . '%')
        ->orWhere('seo_description', 'LIKE', '%' . $query->query('query') . '%')
        ->paginate(12);
    }
}