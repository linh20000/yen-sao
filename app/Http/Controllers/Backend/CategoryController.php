<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function listCategory(){
        $categories_list = $this->categoryRepository->getPaginate(8);
        $dataLength = count($categories_list);
        return view('backend.category.list', ['breadcrumb' => 'Danh sách danh mục'], compact('categories_list', 'dataLength'));
    }

    public function createCategory()
    {
        $category_id = $this->categoryRepository->getCategoryId();
        return view('backend.category.create', ['breadcrumb' => 'Thêm danh mục'], compact('category_id'));
    }
    public function post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'seo_title' => 'required',
            'seo_description' => 'required',
            'seo_keyword' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên',
            'seo_title.required' => 'Vui lòng nhập tiêu đề tìm kiếm',
            'seo_description.required' => 'Vui lòng nhập miêu tả tìm kiếm',
            'seo_keyword.required' => 'Vui lòng nhập từ khóa tìm kiếm',
        ]);
        $data = $request->all();
        $this->categoryRepository->create($data);
        return back()->with('success', 'Thêm danh mục thành công');
    }

    public function getUpdateCategory($id)
    {
        $category = $this->categoryRepository->find($id);
        $category_id = $this->categoryRepository->getCategoryId();
        return view('backend.category.update', ['breadcrumb' => 'Chỉnh sửa danh mục'], compact('category', 'category_id'));
    }
    public function updateCategory($id, Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'seo_title' => 'required',
            'seo_description' => 'required',
            'seo_keyword' => 'required',
        ], [
            'category_name.required' => 'Vui lòng nhập tên',
            'seo_title.required' => 'Vui lòng nhập tiêu đề tìm kiếm',
            'seo_description.required' => 'Vui lòng nhập miêu tả tìm kiếm',
            'seo_keyword.required' => 'Vui lòng nhập từ khóa tìm kiếm',
        ]);
        $data = $request->all();
        $this->categoryRepository->update($id, $data);
        return redirect(route('admin.category'))->with('success', 'Cập nhật thành công');
    }

    public function deleteCategory($id){
        $this->categoryRepository->delete($id);
        return back()->with('success', 'Xóa thành công danh mục');
    }

    public function search(Request $request){
        $categories_list = $this->categoryRepository->search($request->name);
        $dataLength = count($categories_list);
        return view('backend.category.list', [
            'breadcrumb' => 'Quản lý danh mục'
        ], compact('categories_list', 'dataLength'));
    }

}
