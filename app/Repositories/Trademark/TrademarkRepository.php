<?php

namespace App\Repositories\Trademark;

use App\Repositories\BaseRepository;

class TrademarkRepository extends BaseRepository implements TrademarkInterface
{
    public function getModel()
    {
        return \App\Models\Trademark::class;
    }
    public function getPaginate($limit)
    {
        return $this->model->orderBy('created_at', 'ASC')->paginate($limit);
    }
}
