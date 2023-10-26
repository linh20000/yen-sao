<?php 

nameSpace App\Repositories\Category;

use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryInterface
{
    public function getModel()
    {
        return \App\Models\Category::class;
    }
    public function getCategoryId()
    {
        return $this->model->where('category_id', '=', 0)->get();
    }
    public function getPaginate($limit)
    {
        return $this->model->where('status','=' ,1)->orderBy('created_at', 'ASC')->paginate($limit);
    }
    public function search($data)
    {
        return $this->model->where('name', 'LIKE', '%' . $data . '%')
            ->orWhere('seo_title', 'LIKE', '%' . $data . '%')
            ->orWhere('seo_keyword', 'LIKE', '%' . $data . '%')
            ->where('status', '=', '1')->paginate(8);
    }
}