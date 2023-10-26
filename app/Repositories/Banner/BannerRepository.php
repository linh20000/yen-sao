<?php

namespace App\Repositories\Banner;

use App\Repositories\BaseRepository;

class BannerRepository extends BaseRepository implements BannerInterface
{
    public function getModel() 
    {
        return \App\Models\Banner::class;
    }
    public function getPaginate($limit)
    {
        return $this->model->orderBy('created_at', 'ASC')->paginate($limit);
    }
    public function getSort($sort){
        return $this->model->where('sort','=',$sort)->get();
    }

}