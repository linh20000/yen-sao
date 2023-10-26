<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\Blog\BlogInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private  $blogRepository;
    public function __construct(BlogInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function BlogList()
    {
        $blog = $this->blogRepository->getPaginate(8);
        return view('backend.blog.list', compact('blog'), ['title' => 'Danh sách blog']);
    }

    public function createBlog()
    {
        return view('backend.blog.create', ['title' => 'Thêm tin tức']);
    }

    public function storeBlog(Request $request)
    {
        $requi = [
            'name'  => 'required|max:255',
            'subname' => 'required|max:255',
            'description' => 'required',
            'seo_title' => 'required|max:255',
            'seo_description' => 'required|max:255',
            'seo_keyword' => 'required|max:255',
            'image'   => 'required'
        ];
        $messages = [
            'name.required'    => 'Nhập tên !!!',
            'subname.required'    => 'Nhập tên phụ !!!',
            'description.required'    => 'Nhập miêu tả !!!',
            'seo_title.required'    => 'Nhập tiêu đề - tìm kiếm !!!',
            'seo_description.required'    => 'Nhập mô tả !!!',
            'seo_keyword.required'    => 'Nhập từ khóa !!!',
            'image.required'  => 'Nhập ảnh !!!'
        ];
        $request->validate($requi, $messages);
        $data = $request->all();
        $this->blogRepository->create($data);
        return back()->with('success', 'Thêm thành công');
    }

    public function getUpdateBlog($id)
    {
        $blog_detail = $this->blogRepository->find($id);
        return view('backend.blog.update', compact('blog_detail'), ['title' => 'Chỉnh sửa blog']);
    }

    public function updateBlog(Request $request, $id)
    {
        $data = $request->all();
        $this->blogRepository->update($id, $data);
        return redirect(route('blog.list'))->with('success', 'Chỉnh sửa thành công.');
    }
    
    public function deleteBlog($id)
    {
        $this->blogRepository->delete($id);
        return redirect(route('blog.list'))->with('success', 'Đã xóa.');
    }
}
