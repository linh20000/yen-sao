<?php

namespace App\Repositories\Blog;

use App\Repositories\BaseRepository;

class BlogRepository extends BaseRepository implements BlogInterface
{
    public function getModel()
    {
        return \App\Models\Blog::class;
    }
    public function getPaginate($limit)
    {
        return $this->model->orderBy('created_at', 'ASC')->paginate($limit);
    }
    public function getRandom($limit)
    {
        return $this->model->orderBy('created_at', 'ASC')->get()->random($limit);
    }
    public function getNewBlog($limit)
    {
        return $this->model->orderBy('updated_at', 'ASC')->take($limit)->get();
    }
}