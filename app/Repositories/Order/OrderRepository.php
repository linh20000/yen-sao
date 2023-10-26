<?php 

namespace App\Repositories\Order;

use App\Repositories\BaseRepository;

class OrderRepository extends BaseRepository implements OrderInterface
{
    public function getModel()
    {
        return \App\Models\Order::class;
    }
    public function getPaginate($limit)
    {
        return $this->model->orderBy('created_at','ASC')->where('status' ,'!=', 2)->paginate($limit);
    }
    public function getPaginateSuccess($limit)
    {
        return $this->model->orderBy('created_at', 'ASC')->where('status', '=', 2)->paginate($limit);
    }
    public function getOrderList($id)
    {
        return $this->model->where('user_id','=',$id)->get();
    }
}